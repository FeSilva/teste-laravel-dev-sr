@extends('layouts.guest')

@section('title', 'Login')

@section('body')
    <div class="card bg-pattern">
        <div class="card-body p-4">

            <div class="text-center w-75 m-auto">
                <div class="auth-brand mb-3">
                    <a href="#" class="logo logo-dark text-center">
                        <span class="logo-lg">
                            <img src="{{ asset('assets/images/logo.jpg') }}" alt="" height="80">
                        </span>
                    </a>
                    <a href="#" class="logo logo-light text-center">
                        <span class="logo-lg">
                            <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="22">
                        </span>
                    </a>
                </div>
                <p class="text-muted mb-4 mt-3 text-center">
                   Entre com seu email e senha para acessar o painel de chamados.
                </p>
            </div>

            <x-validation-errors class="mb-3" />

            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input
                      type="email"
                      id="email"
                      name="email"
                      class="form-control"
                      value="{{ old('email') }}"
                      required
                      autofocus
                    >
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group input-group-merge">
                        <input
                          type="password"
                          id="password"
                          name="password"
                          class="form-control"
                          required
                        >
                        <div class="input-group-text" data-password="false">
                            <span class="password-eye"></span>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input
                          type="checkbox"
                          class="form-check-input"
                          id="remember_me"
                          name="remember"
                        >
                        <label class="form-check-label" for="remember_me">
                            Remember me
                        </label>
                    </div>
                </div>

                <div class="text-center d-grid">
                    <button type="submit" class="btn btn-primary">
                        Acessar
                    </button>
                </div>
            </form>

        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12 text-center">
            @if (Route::has('register'))
                <p class="text-white-50">
                  Não tem uma conta?
                  <a href="{{ route('register') }}" class="text-white ms-1"><b>Criar uma conta</b></a>
                </p>
            @endif
        </div>
    </div>
@endsection
