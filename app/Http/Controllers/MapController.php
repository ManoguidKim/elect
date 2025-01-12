<?php

namespace App\Http\Controllers;

use App\Models\Barangay;
use App\Models\Municipality;
use App\Models\Voter;
use Illuminate\Http\Request;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role == "Admin") {
            $municipality = Municipality::where('id', auth()->user()->municipality_id)->first()->name;
            return view('map.index', [
                'municipality' => $municipality
            ]);
        } else {
        }
    }

    public function province_map()
    {
        $voterFactions = Voter::select('municipalities.name as municipality_name')

            // Get the count of allies, opponents, and undecided voters
            ->selectRaw('COUNT(voters.id) as total_voters')
            ->selectRaw('SUM(voters.remarks = "ally") as ally_count')
            ->selectRaw('SUM(voters.remarks = "opponent") as opponent_count')
            ->selectRaw('SUM(voters.remarks = "undecided") as undecided_count')

            // Join with municipalities and barangays tables
            ->join('municipalities', 'municipalities.id', '=', 'voters.municipality_id')
            // Filter for active voters and search condition
            ->where('voters.status', 'Active')
            // Group by municipality and barangay names
            ->groupBy('municipalities.name')
            // Order by municipality and barangay names
            ->orderBy('municipalities.name', 'asc')
            ->get();

        // Calculate percentages for each barangay
        $voterFactions = $voterFactions->map(function ($record) {
            $totalVoters = $record->total_voters;

            // Calculate the percentage for each category
            $record->ally_percentage = $totalVoters ? round(($record->ally_count / $totalVoters) * 100, 2) : 0;
            $record->opponent_percentage = $totalVoters ? round(($record->opponent_count / $totalVoters) * 100, 2) : 0;
            $record->undecided_percentage = $totalVoters ? round(($record->undecided_count / $totalVoters) * 100, 2) : 0;

            return $record;
        });


        return view('map.admin_map');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
