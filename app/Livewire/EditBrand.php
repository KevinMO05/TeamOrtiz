<?php

namespace App\Livewire;

use App\Models\SupplementBrand;
use Livewire\Component;

class EditBrand extends Component
{
    public $name, $brand;
    public function mount(SupplementBrand $id)
    {
        $this->brand = SupplementBrand::find($id)->first();
        
        $this->name = $this->brand->name;
    }
    public function render()
    {
        return view('livewire.edit-brand')->layout('layouts.app');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
        ]);
        $this->brand->name = $this->name;
        $this->brand->save();

        return redirect()->route('supplements.brands');
    }
}
