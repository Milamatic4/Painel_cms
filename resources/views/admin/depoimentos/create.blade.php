@extends('admin.layouts.master')
@section('content')

<section class="section">
    <div class="section-header">
      <h1>Criar</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Painel</a></div>
        <div class="breadcrumb-item active"><a href="{{ route('depoimentos.index') }}">Listar</a></div>
        <div class="breadcrumb-item">Criar</div>
      </div>
    </div>

    <div class="section-body">

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Depoimentos</h4>

              <div class="card-header-action">
               <a href="" class="btn btn-primary" data-toggle="modal" data-target="#ajuda">Ajuda?</a>
              </div>

            </div>

            <div class="card-body">

                <form action="{{ route('depoimentos.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                

                  <div class="form-group">
                    <label for="">Foto(800x600px)</label>
                    <input type="file" name="capa" class="form-control" >
                  </div>

                  <div class="form-group">
                    <label for="">Nome</label>
                    <input type="text" name="titulo" placeholder="Add o nome " class="form-control" value="{{ old('titulo')}}">
                  </div>


                  <div class="form-group ">
                    <label>Descrição:</label>
                      <textarea class="summernote" name="descricao"></textarea>

                  </div>

                  <div class="form-group">
                    <label for="">Vídeo(Opcional)</label>
                    <input type="text" name="video" placeholder="Add vídeo do post" class="form-control" value="{{ old('video')}}">
                  </div>


                  <div class="form-group">
                    <label for="">Status</label>
                    <select name="status" class="form-control">
                      <option value="S">Ativo</option>
                      <option value="N">Cancelado</option>
                    </select>
                  </div>


                  <button type="submit" class="btn btn-primary">Salvar</button>

                </form>

            </div>

          </div>
        </div>

      </div>

    </div>
</section>

@endsection