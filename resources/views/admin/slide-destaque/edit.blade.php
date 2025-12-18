@extends('admin.layouts.master')
@section('content')

<section class="section">
    <div class="section-header">
      <h1>Atualizar Slide</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('slide-destaque.index') }}">Painel</a></div>
        <div class="breadcrumb-item">Atualizar</div>
      </div>
    </div>

    <div class="section-body">

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Slide destaque</h4>

              <div class="card-header-action">
               <a href="" class="btn btn-primary" data-toggle="modal" data-target="#ajuda">Ajuda?</a>
              </div>

            </div>

            <div class="card-body">

                <form action="{{ route('slide-destaque.update', $slide->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                  <div class="form-group">
                  <img src="{{ asset('storage/' . $slide->imagem) }}" style="width:190px;">
    

                  </div>

                  <div class="form-group">
                    <label for="">Imagem(1920x778px)</label>
                    <input type="file" name="imagem" class="form-control" >
                  </div>

                  <div class="form-group">
                    <label for="">Título 1</label>
                    <input type="text" name="titulo_1" placeholder="Add título" class="form-control" value="{{ old('titulo_1', $slide->titulo_1) }}">
                  </div>

                  <div class="form-group">
                    <label for="">Título 2</label>
                    <input type="text" name="titulo_2" placeholder="Add título" class="form-control" value="{{ old('titulo_2', $slide->titulo_2) }}">
                  </div>

                  <div class="form-group">
                    <label for="">Link</label>
                    <input type="url" name="link" placeholder="Add URL" class="form-control" value="{{ old('link', $slide->link) }}">
                  </div>

                  <div class="form-group">
                    <label for="">Ordem</label>
                    <input type="number" name="ordem" placeholder="Add Ordem de Exibição" class="form-control" value="{{ old('ordem', $slide->ordem) }}">
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