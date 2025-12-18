<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ServicoDataTable;
use App\Http\Controllers\Controller;
use App\Models\Servico;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Flasher\Laravel\Facade\Flasher;

class ServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */ 
    public function index(ServicoDataTable $dataTable)
    {
        return $dataTable->render('admin.servicos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.servicos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'icone' => ['required','max:200'],
            'titulo' => ['required','max:200'],
            'descricao' => ['required'],
        ]);

        $servico = new Servico();
        $servico->icone = $request->icone;
        $servico->titulo = $request->titulo;
        $servico->descricao = $request->descricao;
        $servico->tipo = 'servicoAdmin';
        $servico->usuario = Auth::user()->id;
        $servico->save();

        Flasher::addSuccess('Serviço cadastrado com sucesso!');
        return redirect()->route('servicos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $servico = Servico::findOrFail($id);
        return view('admin.servicos.edit', compact('servico'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'icone' => ['required','max:200'],
            'titulo' => ['required','max:200'],
            'descricao' => ['required'],
        ]);

        $servico = Servico::findOrFail($id);
        $servico->icone = $request->icone;
        $servico->titulo = $request->titulo;
        $servico->descricao = $request->descricao;
        $servico->tipo = 'servicoAdmin';
        $servico->usuario = Auth::user()->id;
        $servico->save();

        Flasher::addSuccess('Atualizado com sucesso!');
        return redirect()->route('servicos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $servico = Servico::findOrFail($id);
        $servico->delete();

        return response(['status' => 'success', 'message' => 'Excluído com sucesso!']);
    }
}
