<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CadastroEmpresaController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/cadastro-empresa', [CadastroEmpresaController::class, 'store'])->name('cadastro.empresa');
