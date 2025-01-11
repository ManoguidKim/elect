<?php

namespace App\Http\Controllers;

use App\Http\Requests\Barangay\AddBarangayRequest;
use App\Http\Requests\Barangay\UpdateBarangayRequest;
use App\Models\Barangay;
use App\Models\Voter;
use Illuminate\Http\Request;

class BarangayController extends Controller
{
    public function create()
    {
        return view('barangay.create');
    }

    public function store(AddBarangayRequest $request)
    {
        $arr = [
            'name' => $request->barangay,
            'municipality_id' => auth()->user()->municipality_id
        ];

        Barangay::create($arr);

        return redirect()->route('system-admin-barangay-list')->with('message', 'Barangay created successfully.');
    }

    public function edit(Barangay $barangay)
    {
        return view('barangay.edit', compact('barangay'));
    }

    public function update(UpdateBarangayRequest $request, Barangay $barangay)
    {
        $arr = [
            'name' => $request->barangay,
            'municipality_id' => auth()->user()->municipality_id
        ];

        $barangayData = Barangay::findOrFail($barangay->id);
        $barangayData->update($arr);

        return redirect()->route('system-admin-barangay-list')->with('message', 'Barangay created successfully.');
    }

    public function destroy(Barangay $barangay) {}

    public function getBarangays()
    {
        $voterFactions = Voter::select('barangays.name')

            // Get the count of allies, opponents, and undecided voters
            ->selectRaw('COUNT(voters.id) as total_voters')
            ->selectRaw('SUM(voters.remarks = "ally") as ally_count')
            ->selectRaw('SUM(voters.remarks = "opponent") as opponent_count')
            ->selectRaw('SUM(voters.remarks = "undecided") as undecided_count')

            // Join with barangays table
            ->join('municipalities', 'municipalities.id', '=', 'voters.municipality_id')
            ->join('barangays', 'barangays.id', '=', 'voters.barangay_id')

            // Filter for active voters and search condition
            ->where('voters.status', 'Active')
            ->where('voters.municipality_id', auth()->user()->municipality_id)

            // Group by barangay name
            ->groupBy('barangays.name')

            // Order by barangay name
            ->orderBy('barangays.name', 'asc')
            ->get();

        $voterFactions = $voterFactions->map(function ($barangay) {
            $totalVoters = $barangay->total_voters;

            // Calculate the percentage for each category
            $barangay->ally_percentage = $totalVoters ? round(($barangay->ally_count / $totalVoters) * 100, 2) : 0;
            $barangay->opponent_percentage = $totalVoters ? round(($barangay->opponent_count / $totalVoters) * 100, 2) : 0;
            $barangay->undecided_percentage = $totalVoters ? round(($barangay->undecided_count / $totalVoters) * 100, 2) : 0;

            return $barangay;
        });

        return response()->json($voterFactions);
    }
}
