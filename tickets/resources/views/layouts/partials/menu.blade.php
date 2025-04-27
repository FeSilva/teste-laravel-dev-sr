<ul class="menu">

    <li class="menu-title">Navegação</li>

    <li class="menu-item">
        <a href="{{ route('dashboard') }}" class="menu-link">
            <span class="menu-icon"><i class="mdi mdi-view-dashboard-outline"></i></span>
            <span class="menu-text">Dashboard</span>
        </a>
    </li>

    <li class="menu-item">
        <a href="#usersSubmenu" data-bs-toggle="collapse" class="menu-link" role="button" aria-expanded="false" aria-controls="usersSubmenu">
            <span class="menu-icon"><i class="mdi mdi-account-multiple-outline"></i></span>
            <span class="menu-text">Usuários</span>
            <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="usersSubmenu">
            <ul class="sub-menu">
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <span class="menu-icon"><i class="mdi mdi-account-plus-outline"></i></span>
                        <span class="menu-text">Novo Usuário</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <span class="menu-icon"><i class="mdi mdi-account-multiple"></i></span>
                        <span class="menu-text">Listar Usuários</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>

    <li class="menu-item">
        <a href="#ordersSubmenu" data-bs-toggle="collapse" class="menu-link" role="button" aria-expanded="false" aria-controls="ordersSubmenu">
            <span class="menu-icon"><i class="mdi mdi-cart-outline"></i></span>
            <span class="menu-text">Pedidos</span>
            <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="ordersSubmenu">
            <ul class="sub-menu">
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <span class="menu-icon"><i class="mdi mdi-cart-plus"></i></span>
                        <span class="menu-text">Novo Pedido</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <span class="menu-icon"><i class="mdi mdi-cart"></i></span>
                        <span class="menu-text">Listar Pedidos</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>

    <li class="menu-item">
        <a href="#" class="menu-link">
            <span class="menu-icon"><i class="mdi mdi-file-chart-outline"></i></span>
            <span class="menu-text">Relatórios</span>
        </a>
    </li>

    <li class="menu-item">
        <a href="#" class="menu-link">
            <span class="menu-icon"><i class="mdi mdi-cog-outline"></i></span>
            <span class="menu-text">Configurações</span>
        </a>
    </li>

</ul>
