<?php

namespace App\Livewire;

use App\Models\Client;
use App\Models\Membership;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class ChangePlan extends Component
{

    public $client, $membership_type, $membership_state, $membership_start, $membership_end, $membership_type_new;

    public function mount(Client $id)
    {
        $this->client = Client::find($id)->first();
        $this->membership_type = $this->client->membership->membership_type;
        $this->membership_state = $this->client->membership->membership_state;
        $this->membership_start = $this->client->membership->membership_start;

       
        
    }
    public function render()
    {
        return view('livewire.change-plan')->layout('layouts.app');
    }


    public function change(){

        $this->membership_type_new = ($this->membership_type == 'Mensual') ? 'Anual' : 'Mensual';

        if ($this->membership_type_new == 'Mensual') {
            $this->membership_end = date('Y-m-d', strtotime(Carbon::now()->format('Y-m-d') . ' + 1 month'));
            
        } else {
            $this->membership_end = date('Y-m-d', strtotime(Carbon::now()->format('Y-m-d'). ' + 1 year'));
        }
        
        Membership::create([
            'client_id' => $this->client->id,
            'membership_type' => $this->membership_type_new,
            'membership_state' => 'Activo',
            'membership_start' => Carbon::now()->format('Y-m-d'),
            'membership_end' => $this->membership_end,
        ]);

        

        $membership_id = Membership::where('membership_type', $this->membership_type_new)
        ->orderBy('id', 'desc') 
        ->first() 
        ->id;
        $user_id = User::where('dni', $this->client->user->dni)->first()->id;


        $this->client->user_id = $user_id;
        $this->client->membership_id = $membership_id;
        $this->client->save();

        return redirect()->route('clients');
    }
}
