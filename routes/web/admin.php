<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoriaController;
use App\Http\Controllers\Backend\DadosController;
use App\Http\Controllers\Backend\DepoimentoController;
use App\Http\Controllers\Backend\PaginaController;
use App\Http\Controllers\Backend\PerfilController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\RedeSocialController;
use App\Http\Controllers\Backend\ServicoController;
use App\Http\Controllers\Backend\SlideDestaqueController;
use App\Http\Controllers\Backend\SmtpEmailController;
use App\Http\Controllers\Backend\UsuarioController;
use App\Http\Controllers\Backend\VideoController;
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

Route::middleware('auth', 'admin')->group(function () {

//Rota do painel de admin universal
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])
->name('admin.dashboard');

/**
 * *******************************************************************************
 * *******************************************************************************
 * INÍCIO CONFIGURAÇÕES DO SITE
 * Acessar as configurações do site
 * *******************************************************************************
 * *******************************************************************************
 */


//Rota do painel
Route::get('admin/dados/', [DadosController::class, 'index'])
->name('dados.index');

//Atualiza as configurações do site
Route::put('admin/dados/update', [DadosController::class, 'update'])
->name('dados.update');

//Rota de SMTP
Route::get('admin/email-smtp/index', [SmtpEmailController::class, 'index'])
->name('email-smtp.index');

//Rota de SMTP update
Route::put('admin/email-smtp/update', [SmtpEmailController::class, 'update'])
->name('email-smtp.update');

//Slide Destaque do site
Route::resource('admin/slide-destaque', SlideDestaqueController::class);

//Redes Sociais do site
Route::resource('admin/redes-sociais', RedeSocialController::class);

//Categorias universais
Route::resource('admin/categorias', CategoriaController::class);

//Muda o status do post
Route::put('admin/posts/muda-status', [PostController::class, 'mudaStatus'])->name('posts.muda-status');

//Posts do site
Route::resource('admin/posts', PostController::class);

//Muda o status das páginas
Route::put('admin/paginas/muda-status', [PaginaController::class, 'mudaStatus'])->name('paginas.muda-status');

//Posts do site
Route::resource('admin/paginas', PaginaController::class);

//Muda o status dos vídeos
Route::put('admin/videos/muda-status', [VideoController::class, 'mudaStatus'])->name('videos.muda-status');

//Posts do site
Route::resource('admin/videos', VideoController::class);

//Muda o status de depoimentos
Route::put('admin/depoimentos/muda-status', [DepoimentoController::class, 'mudaStatus'])->name('depoimentos.muda-status');

//Depoimentos do site
Route::resource('admin/depoimentos', DepoimentoController::class);

//Serviços do site
Route::resource('admin/servicos', ServicoController::class);


//Rotas do perfil do usuario logado
Route::get('admin/perfil/index', [PerfilController::class, 'index'])
->name('admin.perfil.index');

//Atualizar os dados do usuario logado
Route::put('admin/perfil/update/{id}', [PerfilController::class, 'update'])
->name('admin.perfil.update');

//Muda o status de depoimentos
Route::put('admin/usuarios/muda-status', [UsuarioController::class, 'mudaStatus'])->name('usuarios.muda-status');

//Usuarios do sistema
Route::resource('admin/usuarios', UsuarioController::class);




});
