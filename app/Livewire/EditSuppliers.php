<?php

namespace App\Livewire;

use App\Models\Supplier;
use Livewire\Component;

class EditSuppliers extends Component
{
    public $supplier, $name, $phone, $address;

    public function mount(Supplier $id)
    {
        $this->supplier = Supplier::find($id)->first();
        $this->name = $this->supplier->name;
        $this->phone = $this->supplier->phone;
        $this->address = $this->supplier->address;

    }
    public function render()
    {
        return view('livewire.edit-suppliers')->layout('layouts.app');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $this->supplier->name = $this->name;
        $this->supplier->phone = $this->phone;
        $this->supplier->address = $this->address;
        $this->supplier->save();
        return redirect()->route('supplements.suppliers');
}
}