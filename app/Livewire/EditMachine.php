<?php

namespace App\Livewire;

use App\Models\Machine;
use Livewire\Component;

class EditMachine extends Component
{
    public $machine, $name;
    public function mount(Machine $id)
    {
        $this->machine = Machine::find($id)->first();
        
        $this->name = $this->machine->name;
    }
    public function render()
    {
        return view('livewire.edit-machine')->layout('layouts.app');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
        ]);
        $this->machine->name = $this->name;
        $this->machine->save();

        return redirect()->route('machines');
    }
}
