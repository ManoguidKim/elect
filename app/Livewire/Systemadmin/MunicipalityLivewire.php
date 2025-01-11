<?php

namespace App\Livewire\Systemadmin;

use App\Models\Municipality;
use Livewire\Component;

class MunicipalityLivewire extends Component
{
    public $search;

    public function render()
    {
        // Check if $search is empty and adjust the query accordingly
        $municipality = Municipality::select('municipalities.id', 'municipalities.name', 'districts.name as district_name')
            ->join('districts', 'districts.id', '=', 'municipalities.district_id')
            ->when($this->search, function ($query) {
                return $query->where('municipalities.name', 'like', '%' . $this->search . '%');
            })
            ->get();

        return view('livewire.systemadmin.municipality-livewire', [
            'municipalities' => $municipality
        ]);
    }
}
