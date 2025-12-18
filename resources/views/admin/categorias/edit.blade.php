@extends('admin.layouts.master')
@section('content')

<section class="section">
    <div class="section-header">
      <h1>Atualizar Categoria</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Painel</a></div>
        <div class="breadcrumb-item active"><a href="{{ route('categorias.index') }}">Listar</a></div>
        <div class="breadcrumb-item">Atualizar</div>
      </div>
    </div>

    <div class="section-body">

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Categoria</h4>

              <div class="card-header-action">
               <a href="" class="btn btn-primary" data-toggle="modal" data-target="#ajuda">Ajuda?</a>
              </div>

            </div>

            <div class="card-body">

                <form action="{{ route('categorias.update', $categoria->id) }}" method="post" enctype="multipart/form-data">
                    @csrf   
                    @method('PUT')

                  <div>
                    <button style="text-align:left; width:20%; padding:15px;" class="btn btn-primary" data-selected-class="btn-danger" data-unselected-class="btn-primary" data-iconset="fontawesome5" data-icon="{{ $categoria->icone }}" role="iconpicker" data-rows="5" data-cols="7" name="icone">
                        
                    </button>
                  </div>
                  </div>  

                  <div class="form-group">
                    <label for="">Nome</label>
                    <input type="text" name="nome" style="width: 50%;" placeholder="Add nome" class="form-control" value="{{ old('nome', $categoria->nome) }}">
                  </div>

                  <div class="form-group">
                    <label for="">Link</label>
                    <input type="url" name="link" style="width: 50%;" placeholder="Add URL" class="form-control" value="{{ old('link') }}">
                  </div>


                  <button type="submit" class="btn btn-primary" style="width: 90px;">Salvar</button>

                </form>

            </div>

          </div>
        </div>

      </div>

    </div>
</section>

@endsection