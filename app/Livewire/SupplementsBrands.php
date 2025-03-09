<?php

namespace App\Livewire;

use App\Models\Supplement;
use App\Models\SupplementBrand;
use Livewire\Component;

class SupplementsBrands extends Component
{

    public $search;
    public function render()
    {
        $brands = SupplementBrand::where('name', 'like', '%' . $this->search . '%')->paginate(10);
        
        return view('livewire.supplements-brands', compact('brands'))->layout('layouts.app');
    }
}
