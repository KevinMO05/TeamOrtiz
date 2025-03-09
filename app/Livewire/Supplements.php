<?php

namespace App\Livewire;

use App\Models\Supplement;
use Livewire\Component;

class Supplements extends Component
{
    public $search;
    public function render()
    {
        $supplements = Supplement::where('name', 'like', '%' . $this->search . '%')->paginate(10);
        
        return view('livewire.supplements', compact('supplements'))->layout('layouts.app');
    }
}
