<div class="app-menu">
    <div class="logo-box">
        <a href="{{ url('/') }}" class="logo-light">
            <img src="{{ asset('assets/images/logo.jpg') }}" alt="logo" class="logo-lg">
            <img src="{{ asset('assets/images/logo.jpg') }}" alt="small logo" class="logo-sm">
        </a>
        <a href="{{ url('/') }}" class="logo-dark">
            <img src="{{ asset('assets/images/logo.jpg') }}" alt="dark logo" class="logo-lg">
            <img src="{{ asset('assets/images/logo.jpg') }}" alt="small logo" class="logo-sm">
        </a>
    </div>

    <div class="scrollbar">
        <!-- Aqui vai o seu menu (aquele gigantesco que veio no HTML) -->
        @include('layouts.partials.menu')
    </div>
</div>
