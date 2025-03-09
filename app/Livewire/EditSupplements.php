<?php

namespace App\Livewire;

use App\Models\Supplement;
use App\Models\SupplementBrand;
use App\Models\Supplier;
use Livewire\Component;

class EditSupplements extends Component
{
    public $supplement, $name, $supplier_id="", $brand_id="", $stock, $suppliers, $brands;

    public function mount(Supplement $id){
        $this->supplement = Supplement::find($id)->first();
        $this->name = $this->supplement->name;
        $this->supplier_id = $this->supplement->supplier_id;
        $this->brand_id = $this->supplement->brand_supplements_id;
        $this->stock = $this->supplement->stock;

        $this->suppliers = Supplier::all();
        $this->brands = SupplementBrand::all();
    }
    public function render()
    {
        return view('livewire.edit-supplements')->layout('layouts.app');
    }

    public function save(){
        $this->supplement->name = $this->name;
        $this->supplement->supplier_id = $this->supplier_id;
        $this->supplement->brand_supplements_id = $this->brand_id;
        $this->supplement->stock = $this->stock;
        $this->supplement->save();
        return redirect()->route('supplements');
}
}