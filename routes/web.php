<?php

use App\Http\Controllers\LoginController;
use App\Livewire\AddCodeMachine;
use App\Livewire\AddCodeSupplements;
use App\Livewire\AddMaintenanceMachine;
use App\Livewire\ChangePlan;
use App\Livewire\CreateBrand;
use App\Livewire\CreateClient;
use App\Livewire\CreateMachine;
use App\Livewire\CreateSupplement;
use App\Livewire\CreateSuppliers;
use App\Livewire\EditBrand;
use App\Livewire\EditClient;
use App\Livewire\EditMachine;
use App\Livewire\EditSupplements;
use App\Livewire\EditSuppliers;
use App\Livewire\RenewalMembership;
use App\Livewire\ShowClients;
use App\Livewire\ShowEmployees;
use App\Livewire\ShowMachines;
use App\Livewire\ShowSuppliers;
use App\Livewire\Supplements;
use App\Livewire\SupplementsBrands;
use App\Livewire\UpdateStatusItem;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Commands\Show;

Route::get('/', function () {
    return view('welcome');
});
//Rutas para clientes y membresias
Route::middleware(['auth','web', 'role:recepcionista|admin'])->group(function () {
    Route::get('/clients', ShowClients::class)->name('clients');
    Route::get('/clients/create', CreateClient::class)->name('clients.create');
    Route::get('/clients/edit/{id}', EditClient::class)->name('clients.edit');
    Route::get('/clients/renewal/{id}', RenewalMembership::class)->name('clients.renewal');
    Route::get('/clients/change-plan/{id}', ChangePlan::class)->name('clients.change-plan');
});

// Rutas para suplementos
Route::middleware(['auth','web', 'role:admin'])->group(function () {
    // Rutas para Suplementos
    Route::get('/supplements', Supplements::class)->name('supplements');
    Route::get('/supplements/brands', SupplementsBrands::class)->name('supplements.brands');
    Route::get('/supplements/brands/create', CreateBrand::class)->name('supplements.brands.create');
    Route::get('/supplements/brands/edit/{id}', EditBrand::class)->name('supplements.brands.edit');
    Route::get('/supplements/suppliers', ShowSuppliers::class)->name('supplements.suppliers');
    Route::get('/supplements/suppliers/create', CreateSuppliers::class)->name('supplements.suppliers.create');
    Route::get('/supplements/suppliers/edit/{id}', EditSuppliers::class)->name('supplements.suppliers.edit');
    Route::get('/supplements/create', CreateSupplement::class)->name('supplements.create');
    Route::get('/suppements/edit/{id}', EditSupplements::class)->name('supplements.edit');
    Route::get('/supplements/{id}/add-code', AddCodeSupplements::class)->name('supplements.add-code');
    Route::get('/supplements/{id}/edit-code/{code}', UpdateStatusItem::class)->name('supplements.edit-code');

    // Rutas para Maquinas
    Route::get('/machines', ShowMachines::class)->name('machines');
    Route::get('/machines/create', CreateMachine::class)->name('machines.create');
    Route::get('/machines/edit/{id}', EditMachine::class)->name('machines.edit');
    Route::get('/machines/{id}/add-code', AddCodeMachine::class)->name('machines.add-code');
    Route::get('/machines/{id}/maintenance/{code}', AddMaintenanceMachine::class)->name('machines.maintenance');

    // Rutas para empleados
    Route::get('/employees', ShowEmployees::class)->name('employees');
});



Route::post('/login-register', [LoginController::class, 'register'])->name('register_login');
Route::get('/login-register', [LoginController::class, 'index'])->name('login_register');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
