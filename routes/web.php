<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rotas organizadas da pasta 'web'
foreach(File::allFiles(__DIR__ . '/web') as $rota_arquivo) {
    require $rota_arquivo->getPathname();
};

// Rota do Painel Admin
Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');

// Rota de Recuperação de Senha do Admin
Route::get('admin/recuperarSenha', [AdminController::class, 'recuperarSenha'])->name('admin.recuperar.senha');

require __DIR__.'/auth.php';

Route::get('/teste', function () {
    return "Funcionou!";
});
