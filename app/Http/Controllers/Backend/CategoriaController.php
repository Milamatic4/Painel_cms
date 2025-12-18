<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\CategoriaDataTable;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Str;
use Flasher\Laravel\Facade\Flasher;

class CategoriaController extends Controller
{ 
    /**
     * Display a listing of the resource.
     */
    public function index(CategoriaDataTable $dataTable)
    {
        return $dataTable->render('admin.categorias.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'nome' => ['required','max:100'],
        ]);

        $categoria = new Categoria();
        $categoria->nome = $request->nome;
        $categoria->icone = $request->icone;
        $categoria->url = Str::slug($request->nome);
        $categoria->link = $request->link;
        $categoria->tipo = 'categoriaNoticiaAdmin';
        $categoria->usuario = Auth::user()->id;
        $categoria->save();

        Flasher::addSuccess('Cadastrado com sucesso!');
        return redirect()->route('categorias.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('admin.categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => ['required','max:100']
        ]);

        $categoria = Categoria::findOrFail($id);
        $categoria->nome = $request->nome;
        $categoria->icone = $request->icone;
        $categoria->link = $request->link;
        $categoria->url = Str::slug($request->nome);
        $categoria->tipo = 'categoriaNoticiaAdmin';
        $categoria->usuario = Auth::user()->id;
        $categoria->save();

        Flasher::addSuccess('Atualizado com sucesso!');

        return redirect()->route('categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return response()->json(['status' => 'success', 'message' => 'Excluído com sucesso!']);
    }
}
