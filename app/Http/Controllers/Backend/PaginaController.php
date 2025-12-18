<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\PaginaDataTable;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Post;
use App\Traits\UploadImagensTrait;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Str;

class PaginaController extends Controller
{
    use UploadImagensTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(PaginaDataTable $dataTable)
    {
        return $dataTable->render('admin.paginas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.paginas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'capa' => ['required','image','max:3000'],
            'titulo' => ['required','max:255'],
            'descricao' => ['required'],
            'status' => ['required'],
        ]);

        $post = new Post();

        $postImg = $this->enviaImagemUnica($request, 'capa', 'pagina');

        $post->capa = $postImg;
        $post->titulo = $request->titulo;
        $post->categoria = $request->categoria;
        $post->url = Str::slug($request->titulo);
        $post->descricao = $request->descricao;
        $post->video = $request->video;
        $post->tags = $request->tags;
        $post->status = $request->status;
        $post->tipo = 'paginaAdmin';
        $post->usuario = Auth::user()->id;
        $post->save();

        Flasher::addSuccess('Cadastrado com sucesso!');

        return redirect()->route('paginas.index');
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
        $post = Post::findOrFail($id);
        return view('admin.paginas.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'capa' => ['nullable','image','max:3000'],
            'titulo' => ['required','max:255'],
            'descricao' => ['required'],
            'status' => ['required'],
        ]);

        $post = Post::findOrFail($id);

        $postImg = $this->atualizaImagemUnica($request, 'capa', 'pagina', $post->capa);

        $post->capa = empty(!$postImg) ? $postImg : $post->capa;
        $post->titulo = $request->titulo;
        $post->categoria = $request->categoria;
        $post->url = Str::slug($request->titulo);
        $post->descricao = $request->descricao;
        $post->video = $request->video;
        $post->tags = $request->tags;
        $post->status = $request->status;
        $post->tipo = 'paginaAdmin';
        $post->usuario = Auth::user()->id;
        $post->save();

        Flasher::addSuccess('Atualizado com sucesso!');

        return redirect()->route('paginas.index');
    }

    /**
     * Muda o status do post
     */

    public function mudaStatus(Request $request)
    {
        $post = Post::findOrFail($request->id);
        $post->status = $request->status == 'true' ? 'S' : 'N';
        $post->save();

        return response()->json(['status' => 'success', 'message' => 'Status atualizado com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);

        $this->deletaImagem($post->capa);

        $post->delete();

        return response()->json(['status' => 'success', 'message' => 'Excluído com sucesso!']);
    }
}
