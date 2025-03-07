<?php

use App\Http\Controllers\LoginController;
use App\Livewire\CreateClient;
use App\Livewire\ShowClients;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//Rutas para clientes y membresias
Route::get('/clients', ShowClients::class)->name('clients');

Route::get('/clients/create', CreateClient::class)->name('clients.create');

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
