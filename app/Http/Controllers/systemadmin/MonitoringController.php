<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use App\Models\Municipality;
use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    public function validatorMonitoring()
    {
        $municipalities = Municipality::all();
        return view('systemadmin.dashboard.monitoring.validator.index', [
            'municipalities' => $municipalities
        ]);
    }

    public function viewValidatorMonitoring()
    {
        $municipalities = Municipality::all();
        return view('systemadmin.dashboard.monitoring.validator.view', [
            'municipalities' => $municipalities
        ]);
    }
}
