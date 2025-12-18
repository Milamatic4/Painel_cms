<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Dados;
use App\Traits\UploadImagensTrait;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Http\Request;

class DadosController extends Controller
{
    use UploadImagensTrait;

    /**
     * Display the main settings info.
     */
    public function index()
    {
        $dados = Dados::first();
        return view('admin.dados.index', compact('dados'));
    }

    /**
     * Update or create the settings data.
     */
    public function update(Request $request)
    {

        // Validação (logo e ícone só são obrigatórios se ainda não existirem)
        $request->validate([
            'logo'      => ['image','max:3000'],
            'icone'     => ['image','max:3000'],
            'nome'      => ['required', 'max:255'],
            'cnpj'      => ['required', 'max:255'],
            'whatsapp'  => ['required', 'max:255'],
            'email'     => ['required', 'max:255'],
            'descricao' => ['required'],
        ]);

        $dados = Dados::find(1);

        // ----------- LOGO -----------
        $logoSite = null;
        $iconeSite = null;

        if ($request->hasFile('logo')) {
            $dados->logo = $this->atualizaImagemUnica(
                $request,
                'logo',
                'empresa',
                $request->file('logo')
            );
        }

        // ----------- ÍCONE -----------
        if ($request->hasFile('icone')) {
            $dados->icone = $this->atualizaImagemUnica(
                $request,
                'icone',
                'empresa',
                $request->file('icone')
            );
        }

        // ----------- DADOS COMUNS -----------
        $dados->nome      = $request->nome;
        $dados->cnpj      = $request->cnpj;
        $dados->whatsapp  = $request->whatsapp;
        $dados->email     = $request->email;
        $dados->descricao = $request->descricao;
        $dados->telefone      = $request->telefone;
        $dados->endereco  = $request->endereco;
        $dados->numero    = $request->numero;
        $dados->cep       = $request->cep;
        $dados->cidade    = $request->cidade;
        $dados->estado    = $request->estado;

        // Salva (update ou create automaticamente)
        $dados->save();

        Flasher::addSuccess('Atualizado com sucesso!');
        return redirect()->back();
    }
}
