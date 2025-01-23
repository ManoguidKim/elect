<?php

namespace App\Http\Controllers;

use App\Models\Municipality;
use Illuminate\Http\Request;

class LogsController extends Controller
{

    public function index()
    {
        return view('logs.index');
    }

    public function adminLog()
    {
        return view('systemadmin.log.activity.index');
    }
}
