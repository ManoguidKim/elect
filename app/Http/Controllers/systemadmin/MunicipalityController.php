<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\systemadmin\AddMunicipalityRequest;
use App\Http\Requests\systemadmin\UpdateMunicipalityRequest;
use App\Models\Barangay;
use App\Models\District;
use App\Models\Municipality;
use App\Models\Voter;
use Illuminate\Http\Request;

class MunicipalityController extends Controller
{
    public function index()
    {
        return view('systemadmin.municipality.index');
    }

    public function create()
    {
        return view('systemadmin.municipality.create', [
            'districts' => District::all()
        ]);
    }

    public function store(AddMunicipalityRequest $request)
    {
        Municipality::create(
            [
                'name' => $request->municipality,
                'district_id' => $request->district,
            ]
        );

        return redirect()->route('admin-manage-municipality')->with('message', 'Municipality created successfully.');
    }

    public function edit(Municipality $municipality)
    {
        $municipalityData = Municipality::select('municipalities.id', 'municipalities.name', 'districts.name as district_name', 'districts.id as district_id')
            ->join('districts', 'districts.id', '=', 'municipalities.district_id')
            ->where('municipalities.id', $municipality->id)
            ->first();


        return view('systemadmin.municipality.edit', [
            'municipality' => $municipalityData,
            'districts' => District::all()
        ]);
    }

    public function update(UpdateMunicipalityRequest $request, Municipality $municipality)
    {
        Municipality::where('id', $municipality->id)->update(
            [
                'name' => $request->municipality,
                'district_id' => $request->district,
            ]
        );

        return redirect()->route('admin-manage-municipality')->with('message', 'Municipality updated successfully.');
    }

    public function destroy(Municipality $municipality)
    {
        $municipality->delete();
        return redirect()->route('admin-manage-municipality')->with('message', 'Municipality deleted successfully.');
    }


    // Method to get Barangays based on Municipality
    public function getBarangays(Request $request)
    {
        if ($request->ajax()) {
            // Retrieve Barangays based on the Municipality ID
            $barangays = Barangay::where('municipality_id', $request->municipality_id)->get();
            return response()->json($barangays);
        }
    }

    public function getMunicipalities()
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

        return response()->json($voterFactions);
    }
}
