<?php

namespace App\Livewire;

use App\Models\Client;
use Livewire\Component;

class RenewalMembership extends Component
{
    public $client, $membership_type, $membership_state, $membership_start, $membership_end;

    protected $rules = [
        'membership_type' => 'required|in:Mensual,Anual',
        'membership_state' => 'required|in:Activo,Inactivo', 
        'membership_start' => 'required|date|after_or_equal:today',
    ];

    protected $validationAttributes = [
        'membership_type' => 'tipo de membresía',
        'membership_state' => 'estado de membresía',
        'membership_start' => 'fecha de inicio de membresía',
        
    ];
    public function mount(Client $id)
    {
        $this->client = Client::find($id)->first();
        
        $this->membership_type = $this->client->membership->membership_type;
        $this->membership_state = $this->client->membership->membership_state;
        $this->membership_start = $this->client->membership->membership_start;
        $this->membership_end = $this->client->membership->membership_end;
    }
    public function render()
    {
        return view('livewire.renewal-membership')->layout('layouts.app');
    }

    public function renewal()
    {
        $this->validate();

        if ($this->membership_type == 'Mensual') {
            $this->membership_end = date('Y-m-d', strtotime($this->membership_start . ' + 1 month'));
        } else {
            $this->membership_end = date('Y-m-d', strtotime($this->membership_start . ' + 1 year'));
        }

        $this->client->membership->membership_type = $this->membership_type;
        $this->client->membership->membership_state = $this->membership_state;
        $this->client->membership->membership_start = $this->membership_start;
        $this->client->membership->membership_end = $this->membership_end;
        $this->client->membership->save();

        return redirect()->route('clients');
}
}
