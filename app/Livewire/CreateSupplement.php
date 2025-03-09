<?php

namespace App\Livewire;

use App\Models\Supplement;
use App\Models\SupplementBrand;
use App\Models\Supplier;
use Livewire\Component;

class CreateSupplement extends Component
{
    public $suppliers, $brands, $name, $supplier_id="", $brand_id="", $stock;

    public function mount(){
        $this->suppliers = Supplier::all();
        $this->brands = SupplementBrand::all();
    }

    public function render()
    {
        return view('livewire.create-supplement')->layout('layouts.app');
    }

    public function save(){
        

        Supplement::create([
            'name' => $this->name,
            'supplier_id' => $this->supplier_id,
            'brand_supplements_id' => $this->brand_id,
            'stock' => $this->stock
        ]);

        return redirect()->route('supplements');
}
}