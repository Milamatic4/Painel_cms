<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Painel de Controle Administrador</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('backend/assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/assets/modules/fontawesome/css/all.min.css') }}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('backend/assets/modules/bootstrap-social/bootstrap-social.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/assets/css/components.css') }}">

  <style>
      /* ======= PALETA OFICIAL ======= */
      :root {
          --azul01: #2e3192;
          --azul02: #1c75bc;
          --azul03: #1e4b9f;
          --azul04: #061f3b;
          --azul05: #63cae8;

          --branco: #FFFFFF;
          --cinza01: #e6e7e8;
          --cinza02: #323031;
          --preto: #000000;
          --vermelho01: #ec1c24;
      }

      /* ===== Fundo Geral ===== */
      body {
          background: var(--azul04) !important;
          color: var(--branco) !important;
      }

      /* ========== CARD LOGIN ========== */
      .card.card-primary {
          background: var(--azul04) !important; /* novo azul interno */
          border: none !important;
          color: var(--branco) !important;
          box-shadow: 0 0 15px rgba(0,0,0,0.4) !important;
      }

      /* Título do card */
      .card-header h4 {
          color: var(--branco) !important;
          font-weight: bold;
      }

      /* ========== INPUTS ========== */
      .form-control {
          background: var(--cinza02) !important;
          border: 1px solid var(--azul05) !important;
          color: var(--branco) !important;
      }

      .form-control:focus {
          border-color: var(--azul05) !important;
          box-shadow: 0 0 0 0.2rem rgba(99,202,232,0.25) !important;
      }

      ::placeholder {
          color: var(--cinza01) !important;
      }

      /* Erros */
      code {
          color: var(--vermelho01) !important;
          font-weight: bold;
      }

      /* ========== CHECKBOX ========== */
      .custom-control-label {
          color: var(--branco) !important;
      }

      /* ========== BOTÃO ENTRAR ========== */
      .btn-primary {
          background: var(--azul03) !important;
          border: none !important;
          color: var(--branco) !important;
      }
      .btn-primary:hover {
          background: var(--azul02) !important;
      }

      /* Links */
      a {
          color: var(--azul05) !important;
      }
      a:hover {
          color: var(--azul03) !important;
      }

      /* Rodapé */
      .simple-footer, .text-center {
          color: var(--branco) !important;
      }
  </style>

</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">

            <div class="login-brand">
              <img src="{{ asset('backend/assets/img/logo.png') }}" 
                   alt="Painel_CMS - EAD"
                   style="width: 90%; height:auto; border:none;">
            </div>

            <div class="card card-primary">
              <div class="card-header">
                <h4>Recuperar Senha</h4>
              </div>

              <div class="card-body">
                <form action="{{ route('password.email') }}" method="post" class="needs-validation" novalidate="">
                @csrf

                  <div class="form-group">
                    <input id="email" type="email" class="form-control" name="email"
                           placeholder="E-mail de acesso"
                           value="{{ old('email') }}"
                           required autofocus>
                    @if ($errors->has('email'))
                        <code>{{ $errors->first('email') }}</code>
                    @endif
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                      <div class="float-right">
                        <a href="{{ route('login') }}" class="text-small">
                          Entrar
                        </a>
                      </div>
                    </div>

                  </div>


                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Recuperar Senha
                    </button>
                  </div>

                </form>
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
                Criado por 
                <a href="" style="color: #00c853 !important; font-weight: bold !important;">
                Camila Morais
                </a>
            </div>

            <div class="simple-footer">
              Todos os direitos reservados &copy; {{ date('Y') }} Camila Morais
            </div>

          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- Scripts -->
  <script src="{{ asset('backend/assets/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('backend/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>

</body>
</html>
