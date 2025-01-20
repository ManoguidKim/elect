<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use App\Models\Voter;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalActiveVoter = Voter::where('status', 'Active')->count();

        // Bar Graph voters per municipalities
        $voterPerMunicipality = Voter::selectRaw("
        municipalities.name, 
        SUM(CASE WHEN voters.status = 'Active' THEN 1 ELSE 0 END) as active_voter
    ")
            ->join('municipalities', 'voters.municipality_id', '=', 'municipalities.id')
            ->groupBy('municipalities.name')
            ->orderBy('municipalities.name')
            ->get();

        $municipalities = $voterPerMunicipality->pluck('name');
        $voterCounts = $voterPerMunicipality->pluck('active_voter');



        // Bar Graph voter faction per municipalities
        $totalVoter = Voter::where('status', 'Active')->count();
        $voterPerMunicipality = Voter::selectRaw("
        municipalities.name, 
        SUM(CASE WHEN voters.remarks = 'Ally' THEN 1 ELSE 0 END) as ally_counts,
        SUM(CASE WHEN voters.remarks = 'Opponent' THEN 1 ELSE 0 END) as opponent_counts,
        SUM(CASE WHEN voters.remarks = 'Undecided' THEN 1 ELSE 0 END) as undecided_counts
    ")
            ->join('municipalities', 'voters.municipality_id', '=', 'municipalities.id')
            ->groupBy('municipalities.name')
            ->orderBy('municipalities.name')
            ->get();

        // Prepare data for the chart
        $municipalities2 = $voterPerMunicipality->pluck('name')->toArray();
        $allyCounts = $voterPerMunicipality->pluck('ally_counts')->toArray();
        $opponentCounts = $voterPerMunicipality->pluck('opponent_counts')->toArray();
        $undecidedCounts = $voterPerMunicipality->pluck('undecided_counts')->toArray();


        // Scan Graph.
        $scannedPerMunicipality = Voter::selectRaw("
            municipalities.name,
            COUNT(voters.id) as total_voters,
            SUM(CASE WHEN scanlogs.id IS NOT NULL THEN 1 ELSE 0 END) as total_scans
        ")
            ->join('municipalities', 'voters.municipality_id', '=', 'municipalities.id')
            ->leftJoin('scanlogs', 'scanlogs.voter_id', '=', 'voters.id')
            ->groupBy('municipalities.name')
            ->orderBy('municipalities.name')
            ->get();

        // Extract data for the view
        $municipalities3 = $scannedPerMunicipality->pluck('name')->toArray();
        $totalVoters3 = $scannedPerMunicipality->pluck('total_voters')->toArray();
        $totalScans3 = $scannedPerMunicipality->pluck('total_scans')->toArray();

        // Prepare chart data with actual and expected values
        $chartData = collect($municipalities)->map(function ($municipality, $index) use ($totalVoters3, $totalScans3) {
            return [
                'x' => $municipality,
                'y' => $totalScans3[$index], // Actual count (scans)
                'goals' => [
                    [
                        'name' => 'Expected',
                        'value' => $totalVoters3[$index], // Expected count (total voters)
                        'strokeWidth' => 5,
                        'strokeDashArray' => 2,
                        'strokeColor' => '#775DD0',
                    ]
                ]
            ];
        })->toArray();

        return view(
            'systemadmin.dashboard.index',
            [
                'totalActiveVoter' => $totalActiveVoter,

                'municipalities_datasets' => $municipalities,
                'votercounts_datasets' => $voterCounts,

                'municipalities_datasets2' => $municipalities2,
                'ally_counts_datasets' => $allyCounts,
                'opponent_counts_datasets' => $opponentCounts,
                'undecided_counts_datasets' => $undecidedCounts,
                'totalVoter' => $totalVoter,

                // Scan Details
                'chartData' => $chartData,
            ]
        );
    }

    public function encoderMonitoring()
    {
        $data = Voter::selectRaw("
    DATE(voters.created_at) as date,
    municipalities.name as municipality_name,
    COUNT(*) as total_inputs
")
            ->join('municipalities', 'municipalities.id', '=', 'voters.municipality_id')
            ->groupBy('date', 'municipality_name')
            ->orderBy('date')
            ->get();

        $chartData = $data->groupBy('municipality_name')->map(function ($group, $key) {
            return [
                'name' => $key,
                'data' => $group->map(function ($item) {
                    return [
                        'x' => $item->date,
                        'y' => $item->total_inputs,
                    ];
                })->toArray(),
            ];
        })->values();

        return view('systemadmin.dashboard.monitoring.index', [
            'chartData' => $chartData->toArray(),
        ]);
    }
}
