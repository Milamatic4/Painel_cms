<style>
/* Botões padrão do painel */
.btn-primary {
    background-color: #2e3192 !important; /* AZUL 01 */
    border: none;
    color: #FFFFFF !important;
}

.btn-primary:hover {
    background-color: #1c75bc !important; /* AZUL 02 */
    border: none;
}

/* Navbar topo */
.main-navbar,
.navbar {
    background-color: #061f3b !important; /* AZUL 04 */
    color: #FFFFFF !important;
}

/* Ícones e links do topo */
.navbar .nav-link,
.navbar .dropdown-item,
.navbar .dropdown-toggle {
    color: #FFFFFF !important;
}

/* Hover dos links no topo */
.navbar .nav-link:hover,
.navbar .dropdown-item:hover {
    color: #63cae8 !important; /* AZUL 05 */
}

/* Ícone do dropdown (mensagens / notificações) */
.dropdown-item-icon.bg-primary {
    background-color: #1e4b9f !important; /* AZUL 03 */
}

.dropdown-item-icon.bg-info {
    background-color: #1c75bc !important; /* AZUL 02 */
}

.dropdown-item-icon.bg-success {
    background-color: #63cae8 !important; /* AZUL 05 */
    color: #000000 !important;
}

.dropdown-item-icon.bg-danger {
    background-color: #ec1c24 !important; /* VERMELHO 01 */
}

/* Estilos do menu dropdown */
.dropdown-menu {
    background: #061f3b !important; /* Cor de fundo do dropdown */
    color: #ffffff !important; /* Cor do texto */
    border: none !important; /* Retira borda */
}

/* Links dentro do dropdown */
.dropdown-item {
    color: #ffffff !important; /* Cor dos itens do dropdown */
}

/* Hover nos itens do dropdown */
.dropdown-item:hover {
    background-color: lightgray !important; /* Cor de fundo ao passar o mouse */
    color: #ffffff !important; /* Cor do texto ao passar o mouse */
}

/* Cabeçalho do dropdown (Mensagens / Notificações) */
.dropdown-header {
    background: #061f3b !important; /* Fundo do cabeçalho */
    color: #ffffff !important; /* Cor do texto */
}

/* Rodapé do dropdown */
.dropdown-footer a {
    color: #63cae8 !important; /* Cor do texto do rodapé */
}

/* Para as notificações e mensagens, ajuste as cores dos ícones e textos */
.dropdown-item-icon.bg-primary {
    background-color: #1e4b9f !important; /* Cor de fundo do ícone */
    color: #ffffff !important; /* Cor do ícone */
}

.dropdown-item-icon.bg-info {
    background-color: #1c75bc !important; /* Cor de fundo do ícone */
    color: #ffffff !important; /* Cor do ícone */
}

/* Ajuste para o texto do usuário no menu */
.nav-link-user .dropdown-menu a {
    color: #ffffff !important; /* Garante que o texto de "Perfil" e outros links seja branco */
}

/* Ajuste para o botão de logout */
.dropdown-item.has-icon.text-danger {
    color: #ec1c24 !important; /* Cor do texto de "Sair" */
}

/* Adiciona um efeito de hover na opção de logout */
.dropdown-item.has-icon.text-danger:hover {
    background-color: #f8d7da !important; /* Cor de fundo ao passar o mouse no logout */
    color: #721c24 !important; /* Cor do texto do "Sair" ao passar o mouse */
}

</style>


<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto ">
        <ul class="navbar-nav mr-3">
            <li>
                <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
            <li>
                <a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none">
                    <i class="fas fa-search"></i>
                </a>
            </li>
        </ul>
    </form>

    <ul class="navbar-nav navbar-right">

        <!-- MENSAGENS -->
        <li class="dropdown dropdown-list-toggle">
            <a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep">
                <i class="far fa-envelope"></i>
            </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">

                <div class="dropdown-header">Mensagens
                    <div class="float-right">
                        <a href="#">Leia todas</a>
                    </div>
                </div>

                <div class="dropdown-list-content dropdown-list-message">

                    <!-- MENSAGEM 1 -->
                    <a href="#" class="dropdown-item dropdown-item-unread">
                        <div class="dropdown-item-avatar">
                    @if(Auth::user()->capa != null)
                    <img src="{{ asset(Auth::user()->capa) }}" class="rounded-circle mr-1" alt="">
                    @else
                    <img src="{{ asset('backend/assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1" alt="">
                    @endif

                            
                            
                            <div class="is-online"></div>
                        </div>
                        <div class="dropdown-item-desc">
                            <b>Maykon</b>
                            <p>Fala dev!</p>
                            <div class="time">07 Setembro 2025</div>
                        </div>
                    </a>

                    <!-- Repete as outras mensagens -->
                </div>

                <div class="dropdown-footer text-center">
                    <a href="#">Veja todas <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </li>

        <!-- NOTIFICAÇÕES -->
        <li class="dropdown dropdown-list-toggle">
            <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep">
                <i class="far fa-bell"></i>
            </a>

            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">Notificações
                    <div class="float-right">
                        <a href="#">Leia tudo</a>
                    </div>
                </div>

                <div class="dropdown-list-content dropdown-list-icons">

                    <a href="#" class="dropdown-item dropdown-item-unread">
                        <div class="dropdown-item-icon bg-primary text-white">
                            <i class="fas fa-code"></i>
                        </div>
                        <div class="dropdown-item-desc">
                            Sou msdev 3
                            <div class="time text-primary">2 Min</div>
                        </div>
                    </a>

                    <!-- Continue igual... -->

                </div>

                <div class="dropdown-footer text-center">
                    <a href="#">Veja tudo <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </li>

        <!-- USUÁRIO -->
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img src="{{ asset('backend/assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1" alt="">
                <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->nome }} {{ Auth::user()->sobrenome }}</div>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('admin.perfil.index') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Perfil
                </a>

                <a href="{{ route('redes-sociais.index') }}" class="dropdown-item has-icon">
                    <i class="fas fa-bolt"></i> Redes Sociais
                </a>

                <a href="{{ route('dados.index') }}" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Configurações
                </a>

                <div class="dropdown-divider"></div>

                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <a href="{{ csrf_token() }}" onclick="event.preventDefault(); this.closest('form').submit();" class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Sair
                    </a>
                </form>
            </div>
        </li>

    </ul>
</nav>
