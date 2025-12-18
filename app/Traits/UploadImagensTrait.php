<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait UploadImagensTrait
{
    // Enviar uma imagem única
    public function enviaImagemUnica(Request $request, $nomeDoCampo, $pasta)
    {
        if ($request->hasFile($nomeDoCampo)) {

            $imagem = $request->file($nomeDoCampo);

            $ext = $imagem->getClientOriginalExtension();
            $nomeArquivo = 'media_' . uniqid() . '-Central' . date('d-m-Y') . '.' . $ext;

            // Salva em storage/app/public/pasta
            $path = $imagem->storeAs($pasta, $nomeArquivo, 'public');

            // Retorna somente: "pasta/arquivo.jpg"
            return $path;
        }
    }

    // Atualizar imagem única
    public function atualizaImagemUnica(Request $request, $nomeDoCampo, $pasta, $outraImg = null)
    {
        if ($request->hasFile($nomeDoCampo)) {

            // Deleta antiga
            if ($outraImg && Storage::disk('public')->exists(str_replace('storage/', '', $outraImg))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $outraImg));
            }

            $imagem = $request->file($nomeDoCampo);

            $ext = $imagem->getClientOriginalExtension();
            $nomeArquivo = 'media_' . uniqid() . '-Central' . date('d-m-Y') . '.' . $ext;

            $path = $imagem->storeAs($pasta, $nomeArquivo, 'public');

            return $path;
        }
    }

    // Galeria
    public function enviaGaleria(Request $request, $nomeDoCampo, $pasta)
    {
        $imagensPaths = [];

        if ($request->hasFile($nomeDoCampo)) {

            foreach ($request->file($nomeDoCampo) as $imagem) {

                $ext = $imagem->getClientOriginalExtension();
                $nomeArquivo = 'media_' . uniqid() . '-Central' . date('d-m-Y') . '.' . $ext;

                $path = $imagem->storeAs($pasta, $nomeArquivo, 'public');

                // Só adiciona o path sem "storage/"
                $imagensPaths[] = $path;
            }

            return $imagensPaths;
        }
    }

    // Deletar imagem
    public function deletaImagem(string $imagem)
    {
        $path = str_replace('storage/', '', $imagem);

        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
