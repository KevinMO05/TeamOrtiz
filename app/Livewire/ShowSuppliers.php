<?php

namespace App\Livewire;

use App\Models\Supplier;
use Livewire\Component;

class ShowSuppliers extends Component
{
    public $search;
    public function render()
    {
        $suppliers = Supplier::where('name', 'like', '%' . $this->search . '%')->paginate(10);
        return view('livewire.show-suppliers', compact('suppliers'))->layout('layouts.app');
    }
}
