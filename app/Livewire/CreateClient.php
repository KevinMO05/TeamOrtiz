<?php

namespace App\Livewire;

use Livewire\Component;

class CreateClient extends Component
{

    public $name, $email, $phone, $dni;
    public $membership_type, $membership_state, $membership_start, $membership_end;

    protected $rules = [
        'name' => 'required|string',
        'email' => 'required|email|unique:users', 
        'phone' => 'required|string|max:9', 
        'dni' => 'required|string|max:8|unique:users', 
        'membership_type' => 'required|in:mensual,anual',
        'membership_state' => 'required|in:active,inactive', 
        'membership_start' => 'required|date',
        'membership_end' => 'required|date|after:membership_start',
    ];

    protected $validationAttributes = [
        'name' => 'nombre',
        'email' => 'correo electrónico',
        'phone' => 'teléfono',
        'dni' => 'DNI',
        'membership_type' => 'tipo de membresía',
        'membership_state' => 'estado de membresía',
        'membership_start' => 'fecha de inicio de membresía',
        'membership_end' => 'fecha de fin de membresía',
    ];

    public function render()
    {
        return view('livewire.create-client')->layout('layouts.app');
    }

    public function save()
    {
        
    }
}
