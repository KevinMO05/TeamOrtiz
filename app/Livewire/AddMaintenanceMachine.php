<?php

namespace App\Livewire;

use App\Models\Machine;
use App\Models\MachineCode;
use App\Models\MaintenanceMachine;
use Livewire\Component;

class AddMaintenanceMachine extends Component
{
    public $machine, $code, $name, $items, $last_maintenance_date, $next_maintenance;
    public function mount(Machine $id, MachineCode $code)
    {
        $this->machine = Machine::find($id)->first();
        $this->name = $this->machine->name;
        $this->code = MachineCode::find($code)->first();
        $this->items = MaintenanceMachine::where('machine_code_id', $this->code->id)->get();
    }
    public function render()
    {
        $this->items = MaintenanceMachine::where('machine_code_id', $this->code->id)->get();
        return view('livewire.add-maintenance-machine')->layout('layouts.app');
    }

    public function save(){
        MaintenanceMachine::create([
            'machine_code_id' => $this->code->id,
            'last_maintenance_date' => $this->last_maintenance_date,
            'next_maintenance' => $this->next_maintenance,
        ]);
    }
}
