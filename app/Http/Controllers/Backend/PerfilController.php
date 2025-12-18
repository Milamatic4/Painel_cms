<?php

namespace App\Http\Controllers\Backend; 

use App\Http\Controllers\Controller;
use App\Models\User;
use Flasher\Laravel\Facade\Flasher;
use App\Traits\UploadImagensTrait;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    use UploadImagensTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.perfil.index');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => ['required','max:100'],
            'sobrenome' => ['required','max:255'],
            'email' => ['required','max:255', 'unique:users,email,'.$id],
        ]);

        $usuario = User::findOrFail($id);

        $fotoUsuario = $this->atualizaImagemUnica($request, 'foto', 'usuario');

        $usuario->foto = $fotoUsuario ? $fotoUsuario : $usuario->foto;
        $usuario->nome = $request->nome;
        $usuario->sobrenome = $request->sobrenome;
        $usuario->telefone = $request->telefone;
        $usuario->nivel = 'admin';
        $usuario->email = $request->email;

        if(isset($request->password)){
            $usuario->password = bcrypt($request->password);
        }else{
            unset($request->password);
        }
        
        $usuario->save();

        Flasher::addSuccess('Atualizado com sucesso!');
        return redirect()->back();
    }

}
