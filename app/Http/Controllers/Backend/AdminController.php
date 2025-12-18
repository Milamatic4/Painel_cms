<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Servico;
use App\Models\Usuario;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Método para exibir o dashboard do admin
    public function dashboard()
    {
        $totalPosts = Post::where('tipo', 'postAdmin')->count();
        $totalPaginas = Post::where('tipo', 'paginaAdmin')->count();
        $totalVideos = Post::where('tipo', 'videoAdmin')->count();
        $totalServicos = Servico::where('tipo', 'servicoAdmin')->count();
        $totalUsuarios = Usuario::where('nivel', 'admin')->count();
        return view('admin.dashboard', compact('totalPosts', 'totalPaginas', 'totalVideos', 
        'totalServicos', 'totalUsuarios'));
    }
    
    // Método para exibir a página de login
    public function login()
    {
        return view('admin.auth.login');
    }

    // Método para exibir a página de recuperação de senha
    public function recuperarSenha()
    {
        return view('admin.auth.forgot-password');
    }
}
