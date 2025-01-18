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
        return view(
            'systemadmin.dashboard.index',
            [
                'totalActiveVoter' => $totalActiveVoter
            ]
        );
    }

    public function totalVoter()
    {
        // Active Voter Per Barangay
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

        return view(
            'systemadmin.dashboard.totalvoter.index',
            [
                'municipalities_datasets' => $municipalities,
                'votercounts_datasets' => $voterCounts,
            ]
        );
    }

    public function voterFaction()
    {
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
        $municipalities = $voterPerMunicipality->pluck('name')->toArray();
        $allyCounts = $voterPerMunicipality->pluck('ally_counts')->toArray();
        $opponentCounts = $voterPerMunicipality->pluck('opponent_counts')->toArray();
        $undecidedCounts = $voterPerMunicipality->pluck('undecided_counts')->toArray();

        return view('systemadmin.dashboard.voterfaction.index', [
            'municipalities_datasets' => $municipalities,
            'ally_counts_datasets' => $allyCounts,
            'opponent_counts_datasets' => $opponentCounts,
            'undecided_counts_datasets' => $undecidedCounts,
            'totalVoter' => $totalVoter
        ]);
    }
}
