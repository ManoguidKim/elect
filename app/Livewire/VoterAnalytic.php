<?php

namespace App\Livewire;

use App\Models\Voter;
use Livewire\Component;

class VoterAnalytic extends Component
{
    public $search = "";

    public function render()
    {
        $voterFactions = Voter::select('barangays.name')

            // Get the count of allies, opponents, and undecided voters
            ->selectRaw('COUNT(voters.id) as total_voters')
            ->selectRaw('SUM(voters.remarks = "ally") as ally_count')
            ->selectRaw('SUM(voters.remarks = "opponent") as opponent_count')
            ->selectRaw('SUM(voters.remarks = "undecided") as undecided_count')

            // Join with barangays table
            ->join('barangays', 'barangays.id', '=', 'voters.barangay_id')

            // Filter for active voters and search condition
            ->where('voters.status', 'Active')
            ->where('barangays.name', 'like', '%' . $this->search . '%')

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

        return
            view(
                'livewire.voter-analytic',
                [
                    'voterfactions' => $voterFactions
                ]
            );
    }
}
