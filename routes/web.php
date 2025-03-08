<?php

use App\Http\Controllers\LoginController;
use App\Livewire\ChangePlan;
use App\Livewire\CreateClient;
use App\Livewire\EditClient;
use App\Livewire\RenewalMembership;
use App\Livewire\ShowClients;
use App\Livewire\Supplements;
use App\Livewire\SupplementsBrands;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//Rutas para clientes y membresias
Route::get('/clients', ShowClients::class)->name('clients');

Route::get('/clients/create', CreateClient::class)->name('clients.create');

Route::get('/clients/edit/{id}', EditClient::class)->name('clients.edit');

Route::get('/clients/renewal/{id}', RenewalMembership::class)->name('clients.renewal');

Route::get('/clients/change-plan/{id}', ChangePlan::class)->name('clients.change-plan');

// Rutas para suplementos

Route::get('/supplements', Supplements::class)->name('supplements');
Route::get('/supplements/brands', SupplementsBrands::class)->name('supplements.brands');

Route::post('/login-register', [LoginController::class, 'register'])->name('register_login');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
