<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\systemadmin\AddMunicipalityRequest;
use App\Http\Requests\systemadmin\UpdateMunicipalityRequest;
use App\Models\District;
use App\Models\Municipality;
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
}
