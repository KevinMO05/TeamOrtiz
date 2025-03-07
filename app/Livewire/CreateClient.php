<?php

namespace App\Livewire;

use App\Models\Client;
use App\Models\Membership;
use App\Models\User;
use Livewire\Component;
use Carbon\Carbon;

class CreateClient extends Component
{

    public $name, $email, $phone, $dni;
    public $membership_type, $membership_state, $membership_start, $membership_end;

   

    protected $rules = [
        'name' => 'required|regex:/^[\pL\s]+$/u',
        'email' => 'required|email|unique:users', 
        'phone' => 'required|string|digits:9', 
        'dni' => 'required|string|digits:8|unique:users', 
        'membership_type' => 'required|in:Mensual,Anual',
        'membership_state' => 'required|in:Activo,Inactivo', 
        'membership_start' => 'required|date|after_or_equal:today',
    ];

    protected $validationAttributes = [
        'name' => 'nombre',
        'email' => 'correo electrónico',
        'phone' => 'teléfono',
        'dni' => 'DNI',
        'membership_type' => 'tipo de membresía',
        'membership_state' => 'estado de membresía',
        'membership_start' => 'fecha de inicio de membresía',
        
    ];

    public function render()
    {
        return view('livewire.create-client')->layout('layouts.app');
    }

   

    public function save()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'dni' => $this->dni
        ]);

        if ($this->membership_type == 'Mensual') {
            $this->membership_end = date('Y-m-d', strtotime($this->membership_start . ' + 1 month'));
        } else {
            $this->membership_end = date('Y-m-d', strtotime($this->membership_start . ' + 1 year'));
        }

        Membership::create([
            'membership_type' => $this->membership_type,
            'membership_state' => $this->membership_state,
            'membership_start' => $this->membership_start,
            'membership_end' => $this->membership_end,
        ]);

        $membership_id = Membership::where('membership_type', $this->membership_type)
        ->orderBy('id', 'desc') 
        ->first() 
        ->id;
        $user_id = User::where('dni', $this->dni)->first()->id;

        Client::create([
            'user_id' => $user_id,
            'membership_id' => $membership_id
        ]);

        return redirect()->route('clients');
    }
}
