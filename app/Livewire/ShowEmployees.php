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

    public function assignRole(Employee $employee, $value){

        if($value == '1'){
            $employee->user->removeRole('recepcionista');
            $employee->user->assignRole('admin');
            $employee->user->removeRole('inhabilitar');
        }elseif($value == '2'){
            $employee->user->removeRole('admin');
            $employee->user->assignRole('recepcionista');
            $employee->user->removeRole('inhabilitar');
        }elseif($value == '3'){
            $employee->user->removeRole('recepcionista');
            $employee->user->removeRole('admin');
            $employee->user->assignRole('inhabilitar');
        }
    }
}
