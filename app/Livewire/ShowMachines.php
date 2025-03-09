<?php

namespace App\Livewire;

use App\Models\Machine;
use Livewire\Component;

class ShowMachines extends Component
{
    public $search;
    public function render()
    {
        $machines = Machine::where('name', 'like', '%' . $this->search . '%')->paginate(10);
        return view('livewire.show-machines', compact('machines'))->layout('layouts.app');
    }
}
