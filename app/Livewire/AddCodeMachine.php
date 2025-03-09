<?php

namespace App\Livewire;

use App\Models\Machine;
use App\Models\MachineCode;
use Livewire\Component;

class AddCodeMachine extends Component
{
    public $machine, $name, $items, $purchase_date, $code;

    public function mount(Machine $id)
    {
        
        $this->machine = Machine::find($id)->first();
        
        $this->name = $this->machine->name;
        $this->items = MachineCode::where('machine_id', $this->machine->id)->get();
        
    }
    public function render()
    {
        $this->items = MachineCode::where('machine_id', $this->machine->id)->get();
        return view('livewire.add-code-machine',)->layout('layouts.app');
    }

    public function save(){
        MachineCode::create([
            'code' => $this->code,
            'machine_id' => $this->machine->id,
            'purchase_date' => $this->purchase_date,
        ]);
        $this->reset(['code', 'purchase_date']);
        
        

    }
}
