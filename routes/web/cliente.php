<?php


use App\Http\Controllers\Backend\ClienteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

/**
 * GRUPO DE ROTAS DO PAINEL DE CONTROLE DO ADMIN
 * CRIADO DIA 27-11-2025
 * AUTOR: CAMILA MORAIS
 * SITE: https://centraltt.com.br
 * VERSÃO: 1.0 LARAVEL 12
 */

Route::middleware('auth', 'user')->group(function () {

//rota do painel de cliente universal
Route::get('cliente/dashboard', [ClienteController::class, 'dashboard'])
->name('cliente.dashboard');

});
