<style>
    /* CORES OFICIAIS */
    :root {
        --azul-01: #2e3192;
        --azul-02: #1c75bc;
        --azul-03: #1e4b9f;
        --azul-04: #061f3b;
        --azul-05: #63cae8;

        --branco: #ffffff;
        --cinza-01: #e6e7e8;
        --cinza-02: #323031;
        --preto: #000000;

        --vermelho-01: #ec1c24;
    }

    /* ===== MENU LATERAL ===== */

    /* Fundo geral do sidebar */
    .main-sidebar,
    .sidebar-style-2 li a {
        background-color: var(--azul-04) !important; /* #061f3b */
        color: var(--branco) !important;
    }

    /* Links do menu */
    .nav-link {
        background-color: var(--azul-04) !important;
        color: var(--branco) !important;
    }

    /* Hover */
    .main-sidebar li a:hover {
        background-color: var(--azul-03) !important; /* #1e4b9f */
        color: var(--branco) !important;
    }

    /* Hover dos submenus */
    .dropdown-menu li a:hover {
        background-color: var(--azul-02) !important; /* #1c75bc */
        color: var(--branco) !important;
    }

    /* Marca (CENTRAL TT) */
    .sidebar-brand a {
        color: var(--branco) !important;
        font-weight: 900;
        font-size: 24px;
    }
</style>

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="admin.dashboard">CENTRAL TT</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="admin.dashboard">CTT</a>
        </div>

        <ul class="sidebar-menu">

            <li class="menu-header">Painel</li>
            <li class="dropdown">
                <a href="{{ route('admin.dashboard') }}" class="nav-link has-dropdown">
                    <i class="fas fa-fire"></i><span>Painel</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link painelms" href="{{ route('admin.dashboard') }}">Página Inicial</a></li>
                    <li><a class="nav-link painelms" href="{{ route('dados.index') }}">Configurações</a></li>
                    <li><a class="nav-link painelms" href="{{ route('email-smtp.index') }}">Configuração E-mail</a></li>
                    <li><a class="nav-link painelms" href="{{ route('slide-destaque.index') }}">Slide Destaque</a></li>
                    <li><a class="nav-link painelms" href="{{ route('redes-sociais.index') }}">Redes Sociais</a></li>
                </ul>
            </li>

            <li class="menu-header">Posts</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fa fa-newspaper"></i> <span>Gerencie Notícias</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link painelms" href="{{ route('posts.index') }}">Posts</a></li>
                    <li><a class="nav-link painelms" href="{{ route('posts.create') }}">Criar Post</a></li>
                    <li><a class="nav-link painelms" href="{{ route('categorias.index') }}">Categorias</a></li>
                    <li><a class="nav-link painelms" href="{{ route('categorias.create') }}">Criar Categoria</a></li>
                </ul>
            </li>

            <li class="menu-header">Páginas</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-columns"></i> <span>Gerencie Páginas</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link painelms" href="{{ route('paginas.index') }}">Listar Páginas</a></li>
                    <li><a class="nav-link painelms" href="{{ route('paginas.create') }}">Criar Página</a></li>
                </ul>
            </li>

            <li class="menu-header">Vídeos</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fa fa-play"></i> <span>Gerencie Vídeos</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link painelms" href="{{ route('videos.index') }}">Listar Vídeos</a></li>
                    <li><a class="nav-link painelms" href="{{ route('videos.create') }}">Criar Vídeo</a></li>
                </ul>
            </li>

            <li class="menu-header">Depoimentos</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fa fa-heart"></i> <span>Gerencie Depoimentos</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link painelms" href="{{ route('depoimentos.index') }}">Listar</a></li>
                    <li><a class="nav-link painelms" href="{{ route('depoimentos.create') }}">Criar</a></li>
                </ul>
            </li>

            <li class="menu-header">Serviços</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fa fa-check-square"></i> <span>Gerencie Serviços</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link painelms" href="{{ route('servicos.index') }}">Listar</a></li>
                    <li><a class="nav-link painelms" href="{{ route('servicos.create') }}">Criar</a></li>
                </ul>
            </li>

            <li class="menu-header">Usuários</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fa fa-user-circle"></i> <span>Gerencie Usuários</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link painelms" href="{{ route('usuarios.index') }}">Listar</a></li>
                    <li><a class="nav-link painelms" href="{{ route('usuarios.create') }}">Criar</a></li>
                </ul>
            </li>

        </ul>
    </aside>
</div>
