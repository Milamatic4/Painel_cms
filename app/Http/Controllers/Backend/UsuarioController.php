<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\UsuarioDataTable;
use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Traits\UploadImagensTrait;
use Illuminate\Http\Request;
use Flasher\Laravel\Facade\Flasher;

class UsuarioController extends Controller
{
    use UploadImagensTrait;


    public function index(UsuarioDataTable $dataTable)
    {
        return $dataTable->render('admin.usuarios.index');
    }


    public function create()
    {
        return view('admin.usuarios.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'max:255'],
            'sobrenome' => ['required', 'max:255'],
            'nivel' => ['required'],
            'email' => ['required', 'unique:users,email', 'max:255'],
            'password' => ['required', 'min:6']
        ]);

        $usuario = new Usuario();

        // Upload da foto
        $fotoUsuario = $this->enviaImagemUnica($request, 'foto', 'usuario');

        $usuario->foto = $fotoUsuario;
        $usuario->nome = $request->nome;
        $usuario->sobrenome = $request->sobrenome;
        $usuario->telefone = $request->telefone;
        $usuario->nivel = $request->nivel;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->status = 'ativo';

        $usuario->save();

        Flasher::addSuccess('Cadastrado com sucesso!');
        return redirect()->route('usuarios.index');
    }



    public function edit(string $id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('admin.usuarios.edit', compact('usuario'));
    }



    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => ['required', 'max:255'],
            'sobrenome' => ['required', 'max:255'],
            'nivel' => ['required'],
            'email' => ['required', 'unique:users,email,' . $id, 'max:255'],
        ]);

        $usuario = Usuario::findOrFail($id);

        // Atualizar imagem corretamente
        $fotoAtualizada = $this->atualizaImagemUnica($request, 'foto', 'usuario', $usuario->foto);

        if ($fotoAtualizada) {
            $usuario->foto = $fotoAtualizada;
        }

        $usuario->nome = $request->nome;
        $usuario->sobrenome = $request->sobrenome;
        $usuario->telefone = $request->telefone;
        $usuario->nivel = $request->nivel;
        $usuario->email = $request->email;

        // Atualiza senha apenas se enviada
        if ($request->filled('password')) {
            $usuario->password = bcrypt($request->password);
        }

        $usuario->save();

        Flasher::addSuccess('Atualizado com sucesso!');
        return redirect()->route('usuarios.index');
    }



    public function mudaStatus(Request $request)
    {
        $usuario = Usuario::findOrFail($request->id);
        $usuario->status = $request->status == 'true' ? 'ativo' : 'inativo';
        $usuario->save();

        return response()->json(['success' => 'Status alterado com sucesso!']);
    }



    public function destroy(string $id)
    {
        $usuario = Usuario::findOrFail($id);

        // DELETA A IMAGEM CORRETAMENTE
        if ($usuario->foto) {
            $this->deletaImagem($usuario->foto);
        }

        $usuario->delete();

        return response(['status' => 'success', 'message' => 'Excluído com sucesso!']);
    }
}

