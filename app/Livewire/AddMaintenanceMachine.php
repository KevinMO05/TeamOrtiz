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
        $this->machine = $id;
        $this->name = $this->machine->name;
        $this->code = $code;
        $this->items = MaintenanceMachine::where('machine_code_id', $this->code->id)->get();
        

    }
    public function render()
    {
        $this->items = MaintenanceMachine::where('machine_code_id', $this->code->id)->get();
        return view('livewire.add-maintenance-machine')->layout('layouts.app');
    }

    public function save(){
        if(!(MaintenanceMachine::where('machine_code_id', $this->code->id)->count()>1)){
            MaintenanceMachine::create([
                'machine_code_id' => $this->code->id,
                'last_maintenance_date' => $this->last_maintenance_date,
                'next_maintenance' => $this->next_maintenance,
            ]);
        }else{
            
            $previous_date_next = MaintenanceMachine::where('machine_code_id', $this->code->id)->orderBy('id', 'desc')
            ->take(1) 
            ->first();
            
            $this->validate([
                'last_maintenance_date' => 'required|after_or_equal:'.$previous_date_next->next_maintenance,
                'next_maintenance' => 'required|after:last_maintenance_date',
            ], [
                'last_maintenance_date.after_or_equal' => 'La fecha de último mantenimiento debe ser posterior o igual a la fecha de próximo mantenimiento anterior',
                'next_maintenance.after' => 'La fecha de próximo mantenimiento debe ser posterior a la fecha de último mantenimiento',
            ]);

            MaintenanceMachine::create([
                'machine_code_id' => $this->code->id,
                'last_maintenance_date' => $this->last_maintenance_date,
                'next_maintenance' => $this->next_maintenance,
            ]);
           
        }
        
    }
}
