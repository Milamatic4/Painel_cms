@extends('admin.layouts.master')
@section('content')

<section class="section">
    <div class="section-header">
      <h1>SMTP Configurações</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="">Painel</a></div>
        <div class="breadcrumb-item">Atualizar</div>
      </div>
    </div>

    <div class="section-body">

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Configurações</h4>

              <div class="card-header-action">
               <a href="" class="btn btn-primary" data-toggle="modal" data-target="#ajuda">Ajuda?</a>
              </div>

            </div>

            <div class="card-body">

                <form action="{{ route('email-smtp.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                  <div class="form-group">
                    <label for="">SMTP</label>
                    <input type="text" name="smtp" class="form-control" placeholder="Add nome SMTP" value="{{ old('smtp', $email->smtp) }}">
                  </div>

                  <div class="form-group">
                    <label for="">E-mail</label>
                    <input type="email" name="email" placeholder="Add e-mail" class="form-control" value="{{ old('email', $email->email)}}">
                  </div>

                  <div class="form-group">
                    <label for="">Senha</label>
                    <input type="password" id="senha" name="senha" placeholder="Add a senha" class="form-control" value="{{ old('senha', $email->senha)}}">
                  </div>

                  <div class="form-group">
                    <label for="">Porta</label>
                    <input type="text" id="porta" name="porta" placeholder="Add a porta" class="form-control" value="{{ old('porta', $email->porta)}}">
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