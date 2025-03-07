<?php

namespace App\Livewire;

use App\Models\Client;
use Livewire\Component;

class EditClient extends Component
{

    public $client, $name, $email, $phone, $dni;

    protected $rules = [
        'name' => 'required|regex:/^[\pL\s]+$/u',
        'email' => 'required|email|unique:users', 
        'phone' => 'required|string|digits:9', 
        'dni' => 'required|string|digits:8|unique:users', 
    ];

    protected $validationAttributes = [
        'name' => 'nombre',
        'email' => 'correo electrónico',
        'phone' => 'teléfono',
        'dni' => 'DNI',
    ];
    
    public function mount(Client $id)
    {
        $this->client = Client::find($id)->first();
        $this->name = $this->client->user->name;
        $this->email = $this->client->user->email;
        $this->phone = $this->client->user->phone;
        $this->dni = $this->client->user->dni;

    }
    
    public function render()
    {
        return view('livewire.edit-client')->layout('layouts.app');
    }

    public function save()
    {
        $rules = $this->rules;

        $rules['dni'] = 'required|unique:users,dni,' . $this->client->user->id;
        $rules['email'] = 'required|unique:users,email,' . $this->client->user->id;

        $this->validate($rules);
        $this->client->user->name = $this->name;
        $this->client->user->email = $this->email;
        $this->client->user->phone = $this->phone;
        $this->client->user->dni = $this->dni;
        $this->client->user->save();

        return redirect()->route('clients');
}
    public function deleteMembership(){
        $this->client->membership->membership_state = 'Inactivo';
        $this->client->membership->save();
        return redirect()->route('clients');
    }
}