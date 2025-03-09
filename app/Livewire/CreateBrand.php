<?php

namespace App\Livewire;

use App\Models\SupplementBrand;
use Livewire\Component;

class CreateBrand extends Component
{
    public $name;

    protected $rules = [
        'name' => 'required|regex:/^[\pL\s]+$/u',
    ];

    protected $validationAttributes = [
        'name' => 'nombre',
        
    ];
    public function render()
    {
        return view('livewire.create-brand')->layout('layouts.app');
    }

    public function save()
    {
        $this->validate();

        SupplementBrand::create([
            'name' => $this->name,
        ]);

        return redirect()->route('supplements.brands');
    }
}
