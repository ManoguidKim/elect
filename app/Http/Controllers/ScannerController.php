<?php

namespace App\Http\Controllers;

use App\Models\Scanlog;
use App\Models\Voter;
use Illuminate\Http\Request;

class ScannerController extends Controller
{
    public function index()
    {
        return view('scanner.index');
    }

    public function show(Request $request)
    {

        date_default_timezone_set('Asia/Manila');

        $voterId = $request->voterid;

        $voterDetails = Voter::find($voterId);

        if (!$voterDetails) {
            return redirect()->route('admin-scanner')->with('error', 'Voter record not found.');
        }

        // Check if a ScanLog already exists for this voter_id
        $scanLogExists = Scanlog::where('voter_id', $voterId)->exists();

        if ($scanLogExists) {
            // If the scan log already exists, return an error message
            return redirect()->route('admin-scanner')->with('error', 'Already scanned this QR code card');
        }

        // Create a new ScanLog record
        $scanLog = new ScanLog();
        $scanLog->voter_id = $voterId;
        $scanLog->user_id = auth()->user()->id;
        $scanLog->save();

        // Return a success message
        return redirect()->route('admin-scanner')->with('message', 'Qr code scanned successfully!');
    }
}
