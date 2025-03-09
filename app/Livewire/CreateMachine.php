<?php

namespace App\Livewire;

use App\Models\Machine;
use Livewire\Component;

class CreateMachine extends Component
{
    public $name;
    public function render()
    {
        return view('livewire.create-machine')->layout('layouts.app');
    }

    public function save(){
        $this->validate([
            'name' => 'required'
        ]);
        Machine::create([
            'name' => $this->name
        ]);
        return redirect()->route('machines');
    }
}
