<?php

namespace App\Livewire;

use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowEmployees extends Component
{
    public $search;
    public function render()
    {
        $employees = Employee::whereHas('user', function ($query) {
            $query->where('email', '<>', Auth::user()->email)
                  ->where(function ($subquery) {
                      $subquery->where('name', 'LIKE', '%' . $this->search . '%')
                               ->orWhere('email', 'LIKE', '%' . $this->search . '%');
                  });
        })->paginate(10);
        return view('livewire.show-employees', compact('employees'))->layout('layouts.app');
    }
}
