<div class="navbar-custom">
    <div class="topbar">
        <div class="topbar-menu d-flex align-items-center gap-1">

            <!-- Topbar Brand Logo -->
            <div class="logo-box">
                <a href="{{ url('/') }}" class="logo-light">
                    <img src="{{ asset('assets/images/logo-light.png') }}" alt="logo" class="logo-lg">
                    <img src="{{ asset('assets/images/logo-sm.png') }}" alt="small logo" class="logo-sm">
                </a>

                <a href="{{ url('/') }}" class="logo-dark">
                    <img src="{{ asset('assets/images/logo-dark.png') }}" alt="dark logo" class="logo-lg">
                    <img src="{{ asset('assets/images/logo-sm.png') }}" alt="small logo" class="logo-sm">
                </a>
            </div>

            <!-- Sidebar Menu Toggle Button -->
            <button class="button-toggle-menu">
                <i class="mdi mdi-menu"></i>
            </button>

            <!-- Dropdown Create New 
            <div class="dropdown d-none d-xl-block">
                <a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button">
                    Criar Novo
                    <i class="mdi mdi-chevron-down ms-1"></i>
                </a>
                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item">
                        <i class="fe-briefcase me-1"></i> Novo Projeto
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="fe-user me-1"></i> Criar Usuário
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="fe-bar-chart-line- me-1"></i> Relatório de Receita
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="fe-settings me-1"></i> Configurações
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fe-headphones me-1"></i> Suporte
                    </a>
                </div>
            </div>-->


        </div>

        <!-- Right side menu -->
        <ul class="topbar-menu d-flex align-items-center">

            <!-- Search -->
            <li class="app-search dropdown me-3 d-none d-lg-block">
                <form>
                    <input type="search" class="form-control rounded-pill" placeholder="Pesquisar..." id="top-search">
                    <span class="fe-search search-icon font-16"></span>
                </form>
            </li>

            <!-- Fullscreen -->
            <li class="d-none d-md-inline-block">
                <a class="nav-link waves-effect waves-light" href="#" data-toggle="fullscreen">
                    <i class="fe-maximize font-22"></i>
                </a>
            </li>

            <!-- User Dropdown -->
            <li class="dropdown">
                <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button">
                    @if (Auth::user()->profile_photo_path)
                        <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="Usuário" class="rounded-circle" height="40">
                    @else
                        @php
                            $name = Auth::user()->name;
                            $names = explode(' ', $name);
                            $initials = strtoupper(substr($names[0], 0, 1));
                            if (count($names) > 1) {
                                $initials .= strtoupper(substr($names[1], 0, 1));
                            }
                        @endphp
                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; font-weight: bold;">
                            {{ $initials }}
                        </div>
                    @endif

                    <span class="ms-1 d-none d-md-inline-block">
                        {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i>
                        <div><small class="text-muted">{{ Auth::user()->setor }}</small></div>
                    </span>
                </a>

                <div class="dropdown-menu dropdown-menu-end profile-dropdown">
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Bem-vindo!</h6>
                    </div>
                  
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item notify-item">
                            <i class="fe-log-out"></i> Sair
                        </button>
                    </form>
                </div>
            </li>

        </ul>
    </div>
</div>
