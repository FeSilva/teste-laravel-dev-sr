@extends('layouts.guest')

@section('title', 'Register & Signup')

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
                            <img src="{{ asset('assets/images/logo.jpg') }}" alt="" height="80">
                        </span>
                    </a>
                </div>
                <p class="text-muted mb-4 mt-3 text-center">
                    Não tem uma conta? Crie sua conta – leva menos de um minuto.
                </p>
            </div>

            <x-validation-errors class="mb-3" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('Nome') }}</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control"
                        value="{{ old('name') }}"
                        required
                        autofocus
                        placeholder="Nome"
                    >
                </div>

                <!-- Setor -->
                <div class="mb-3">
                    <label for="setor" class="form-label">Setor</label>
                    <select
                        id="setor"
                        name="setor"
                        class="form-control"
                        required
                    >
                        <option value="" disabled {{ old('setor') ? '' : 'selected' }}>Escolha um setor</option>
                        <option value="suporte" {{ old('setor') == 'suporte' ? 'selected' : '' }}>Suporte</option>
                        <option value="solicitantes" {{ old('setor') == 'solicitantes' ? 'selected' : '' }}>Solicitantes</option>
                    </select>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('E-mail') }}</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email') }}"
                        required
                        placeholder="Enter your email"
                    >
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Senha') }}</label>
                    <div class="input-group input-group-merge">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-control"
                            required
                            placeholder="Enter your password"
                        >
                        <div class="input-group-text" data-password="false">
                            <span class="password-eye"></span>
                        </div>
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">{{ __('Confirmação de Senha') }}</label>
                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        class="form-control"
                        required
                        placeholder="Confirm your password"
                    >
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mb-3">
                        <div class="form-check">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="terms"
                                id="terms"
                                required
                            >
                            <label class="form-check-label" for="terms">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="text-dark">'.__('Terms of Service').'</a>',
                                    'privacy_policy'  => '<a target="_blank" href="'.route('policy.show').'" class="text-dark">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </label>
                        </div>
                    </div>
                @endif

                <div class="text-center d-grid">
                    <button type="submit" class="btn btn-success">
                        {{ __('Criar Conta') }}
                    </button>
                </div>
            </form>

        </div> <!-- end card-body -->
    </div> <!-- end card -->

    <div class="row mt-3">
        <div class="col-12 text-center">
            <p class="text-white-50">
                Já tem uma conta?
                <a href="{{ route('login') }}" class="text-white ms-1"><b>Login</b></a>
            </p>
        </div>
    </div>
@endsection
