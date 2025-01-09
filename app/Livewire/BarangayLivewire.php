<?php

namespace App\Livewire;

use App\Models\Barangay;
use Livewire\Component;
use Livewire\WithPagination;

class BarangayLivewire extends Component
{
    use WithPagination;

    public $barangay;
    public $barangayID = "";
    public $search = "";
    public $isEdit = false;

    protected $rules = [
        'barangay' => 'required|string',
    ];

    public function addBarangay()
    {

        $this->validate();
        Barangay::create(
            [
                'name' => $this->barangay
            ]
        );

        session()->flash('message', 'Barangays created successfully');

        $this->resetField();
    }

    public function editBarangay(Barangay $barangay)
    {
        $barangayData = Barangay::findOrFail($barangay->id);
        $this->barangayID = $barangayData->id;
        $this->barangay = $barangayData->name;

        $this->isEdit = true;
    }

    public function updateBarangay()
    {
        $this->validate();

        $barangayData = Barangay::findOrFail($this->barangayID);
        $barangayData->update([
            'name' => $this->barangay
        ]);

        session()->flash('message', 'Barangay updated successfully');
        $this->resetField();
    }

    public function deleteBarangay(Barangay $barangay)
    {
        $barangay->delete();
        session()->flash('message', 'Barangay deleted successfully');
    }

    public function resetField()
    {
        $this->barangay = "";
        $this->search = "";

        $this->isEdit = false;
    }

    public function render()
    {
        $barangays = Barangay::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('name', 'like', '%' . $this->search . '%')
            ->paginate(50);

        return view('livewire.barangay-livewire', ['barangays' => $barangays]);
    }
}
