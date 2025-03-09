<?php

namespace App\Livewire;

use App\Models\Supplement;
use App\Models\SupplementsCode;
use Livewire\Component;

class UpdateStatusItem extends Component
{
    public $supplement, $code, $code_current;
    public  $name, $supplier_name, $brand_name, $purchase_date, $expiration_date, $state="", $items;
    public function mount(Supplement $id, SupplementsCode $code)
    {
        $this->supplement = Supplement::find($id)->first();
        $this->code = SupplementsCode::find($code)->first();
        $this->name = $this->supplement->name;
        $this->supplier_name = $this->supplement->supplier->name;
        $this->brand_name = $this->supplement->brand->name;
        $this->state = $this->code->state;
        $this->code_current = $this->code->code;
    }
    public function render()
    {
        return view('livewire.update-status-item')->layout('layouts.app');
    }

    public function save(){
        $this->code->state = $this->state;
        $this->code->save();
        $this->reset(['state']);
        return redirect()->route('supplements.add-code', $this->supplement->id);

    }
}
