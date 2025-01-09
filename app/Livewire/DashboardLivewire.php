<?php

namespace App\Livewire;

use App\Models\Scanlog;
use App\Models\Voter;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DashboardLivewire extends Component
{
    public function render()
    {

        $activeVoter = Voter::where(['status' => 'Active'])->count();
        $voterTaggedAlly = Voter::where(['status' => 'Active', 'remarks' => 'Ally'])->count();
        $voterTaggedOpponent = Voter::where(['status' => 'Active', 'remarks' => 'Opponent'])->count();
        $voterTaggedUndecided = Voter::where(['status' => 'Active', 'remarks' => 'Undecided'])->count();

        // Gender
        $voterGenderBracket = Voter::selectRaw("
            SUM(CASE WHEN gender = 'male' THEN 1 ELSE 0 END) as male_count,
            SUM(CASE WHEN gender = 'female' THEN 1 ELSE 0 END) as female_count,
            SUM(CASE WHEN gender != 'female' AND gender != 'male' THEN 1 ELSE 0 END) as other_gender_count
        ")->first();

        // Age Bracket
        $voterAgeBracket = Voter::select(
            DB::raw('SUM(CASE WHEN TIMESTAMPDIFF(YEAR, dob, CURDATE()) BETWEEN 18 AND 34 THEN 1 ELSE 0 END) as young_adult'),
            DB::raw('SUM(CASE WHEN TIMESTAMPDIFF(YEAR, dob, CURDATE()) BETWEEN 35 AND 49 THEN 1 ELSE 0 END) as middle_age_adult'),
            DB::raw('SUM(CASE WHEN TIMESTAMPDIFF(YEAR, dob, CURDATE()) BETWEEN 50 AND 64 THEN 1 ELSE 0 END) as older_age'),
            DB::raw('SUM(CASE WHEN TIMESTAMPDIFF(YEAR, dob, CURDATE()) >= 65 THEN 1 ELSE 0 END) as senior')
        )
            ->first();

        // Faction
        $voterFactionBracket = Voter::selectRaw("
            SUM(CASE WHEN remarks = 'Ally' THEN 1 ELSE 0 END) as ally_count,
            SUM(CASE WHEN remarks = 'Opponent' THEN 1 ELSE 0 END) as opponent_count,
            SUM(CASE WHEN remarks = 'Undecided' THEN 1 ELSE 0 END) as undecided_count
        ")
            ->where('status', 'Active')
            ->first();


        // Active Voter Per Barangay
        $voterPerBarangay = Voter::selectRaw("
        barangays.name, 
        SUM(CASE WHEN voters.status = 'Active' THEN 1 ELSE 0 END) as active_voter
    ")
            ->join('barangays', 'voters.barangay_id', '=', 'barangays.id')
            ->groupBy('barangays.name')
            ->orderBy('barangays.name')
            ->get();

        $barangays = $voterPerBarangay->pluck('name');
        $voterCounts = $voterPerBarangay->pluck('active_voter');





        // Count Scanned QR 
        $scannedVoter = Scanlog::count();

        return
            view(
                'livewire.dashboard-livewire',
                [
                    'activeVoter' => $activeVoter,
                    'voterTaggedAlly' => $voterTaggedAlly,
                    'voterTaggedOpponent' => $voterTaggedOpponent,
                    'voterTaggedUndecided' => $voterTaggedUndecided,
                    'voterGenderBracket' => $voterGenderBracket,
                    'voterAgeBracket' => $voterAgeBracket,
                    'voterPerBarangay' => $voterPerBarangay,
                    'voterFactionBracket' => $voterFactionBracket,

                    'barangays_datasets' => $barangays,
                    'votercounts_datasets' => $voterCounts,

                    'scannedVoter' => $scannedVoter
                ]
            );
    }
}
