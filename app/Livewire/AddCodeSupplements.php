<?php

namespace App\Livewire;

use App\Models\Supplement;
use App\Models\SupplementsCode;
use Livewire\Component;
use Livewire\WithPagination;

class AddCodeSupplements extends Component
{
    use WithPagination;
    public $supplement, $name, $supplier_name, $brand_name, $code, $purchase_date, $expiration_date, $state="", $items;

    public function mount(Supplement $id)
    {
        $this->supplement = Supplement::find($id)->first();
        $this->name = $this->supplement->name;
        $this->supplier_name = $this->supplement->supplier->name;
        $this->brand_name = $this->supplement->brand->name;
        $this->items = SupplementsCode::where('supplements_id', $this->supplement->id)->get();
    }
    public function render()
    {
        $this->items = SupplementsCode::where('supplements_id', $this->supplement->id)->get();
        return view('livewire.add-code-supplements')->layout('layouts.app');
    }

    public function save(){
        SupplementsCode::create([
            'code' => $this->code,
            'purchase_date' => $this->purchase_date,
            'expiration_date' => $this->expiration_date,
            'supplements_id' => $this->supplement->id,
            'state' => $this->state
        ]);
        $this->reset(['code', 'purchase_date', 'expiration_date', 'state']);

    }
}
