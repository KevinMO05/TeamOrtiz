<?php

namespace App\Livewire;

use App\Models\Supplier;
use Livewire\Component;

class CreateSuppliers extends Component
{
    public $name, $phone, $address;

    protected $rules = [
        'name' => 'required|regex:/^[\pL\s]+$/u',
        'phone' => 'required|string|digits:9',
        'address' => 'required|string|max:255', 
    ];

    protected $validationAttributes = [
        'name' => 'nombre',
        'address' => 'direccion',
        'phone' => 'teléfono',
        
    ];
    public function render()
    {
        return view('livewire.create-suppliers')->layout('layouts.app');
    }

    public function save()
    {
        $this->validate();

        Supplier::create([
            'name' => $this->name,
            'phone' => $this->phone,
            'address' => $this->address,
        ]);
        return redirect()->route('supplements.suppliers');
    }
}
