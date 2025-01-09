<?php

namespace App\Livewire\Faction;

use App\Models\Voter;
use Livewire\Component;

class VoterFactionLivewire extends Component
{
    public $search = "";

    public function render()
    {
        $voterTaggedAlly = Voter::where(['status' => 'Active', 'remarks' => 'Ally'])->count();
        $voterTaggedOpponent = Voter::where(['status' => 'Active', 'remarks' => 'Opponent'])->count();
        $voterTaggedUndecided = Voter::where(['status' => 'Active', 'remarks' => 'Undecided'])->count();

        $voterFactions = Voter::select('barangays.name')

            ->selectRaw('SUM(voters.remarks = "ally") as ally_count')
            ->selectRaw('SUM(voters.remarks = "opponent") as opponent_count')
            ->selectRaw('SUM(voters.remarks = "undecided") as undecided_count')

            ->join('barangays', 'barangays.id', '=', 'voters.barangay_id')

            ->where('voters.status', 'Active')
            ->where('barangays.name', 'like', '%' . $this->search . '%')

            ->groupBy('barangays.name')
            ->orderBy('barangays.name', 'asc')
            ->get();

        return
            view(
                'livewire.faction.voter-faction-livewire',
                [
                    'voterTaggedAlly' => $voterTaggedAlly,
                    'voterTaggedOpponent' => $voterTaggedOpponent,
                    'voterTaggedUndecided' => $voterTaggedUndecided,
                    'voterfactions' => $voterFactions
                ]
            );
    }
}
