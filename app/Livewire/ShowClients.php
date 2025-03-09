<?php

namespace App\Livewire;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;

class ShowClients extends Component
{

    use WithPagination;

    public $search;

    public function render()
    {
        
        $clients = Client::whereHas('user', function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%');
        })->paginate(10);
        return view('livewire.show-clients', compact('clients'))->layout('layouts.app');
    }
}
