<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SlideDestaqueDataTable;
use App\Http\Controllers\Controller;
use App\Models\SlideDestaque;
use Illuminate\Http\Request;
use App\Traits\UploadImagensTrait;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Support\Facades\Auth;

class SlideDestaqueController extends Controller
{
    use UploadImagensTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(SlideDestaqueDataTable $dataTable)
    {
        return $dataTable->render('admin.slide-destaque.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slide-destaque.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'imagem' => ['required','image','max:3000'],
            'link' => ['url'],
            'ordem' => ['required'],
        ]);

        $slide = new SlideDestaque();

        $capaSlide = $this->enviaImagemUnica($request, 'imagem', 'slide', $slide->imagem);

        $slide->imagem = $capaSlide;
        $slide->titulo_1 = $request->titulo_1;
        $slide->titulo_2 = $request->titulo_2;
        $slide->link = $request->link;
        $slide->ordem = $request->ordem;
        $slide->tipo = 'slideAdmin';
        $slide->usuario = Auth::user()->id;

        $slide->save();

        Flasher::addSuccess('Cadastrado com sucesso!');
        return redirect()->route('slide-destaque.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $slide = SlideDestaque::findOrFail($id);
        return view('admin.slide-destaque.edit', compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'imagem' => ['nullable','image','max:3000'],
            'ordem' => ['required'],
            'link' => ['url'],
        ]);

        $slide = SlideDestaque::findOrFail($id);

        $capaSlide = $this->atualizaImagemUnica($request, 'imagem', 'slide', $slide->imagem);

        $slide->imagem = $capaSlide ? $capaSlide : $slide->imagem;
        $slide->titulo_1 = $request->titulo_1;
        $slide->titulo_2 = $request->titulo_2;
        $slide->link = $request->link;
        $slide->ordem = $request->ordem;
        $slide->tipo = 'slideAdmin';
        $slide->usuario = Auth::user()->id;


        $slide->save();

        Flasher::addSuccess('Atualizado com sucesso!');
        return redirect()->route('slide-destaque.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slide = SlideDestaque::findOrFail($id);
        $this->deletaImagem($slide->imagem);
        $slide->delete();
        return response(['status' => 'success', 'message' => 'Excluído com sucesso!'], );
    }
}
