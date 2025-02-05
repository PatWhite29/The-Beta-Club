@extends('layouts.app')

@section('content')
<div class="container">
    <style>
        /* Cambiar el estilo de focus y outline */
        input:focus, .form-check-input:focus, button:focus {
            border-color: #6f42c1 !important;
            box-shadow: 0 0 5px #6f42c1 !important;
            outline: none !important;
        }

        /* Personalizar la checkbox */
        .form-check-input {
            border: 2px solid #6f42c1 !important;
            background-color: transparent !important;
            width: 1.25em;
            height: 1.25em;
        }

        .form-check-input:checked {
            background-color: #6f42c1 !important;
            border-color: #6f42c1 !important;
        }

        .form-check-input:focus {
            box-shadow: 0 0 5px #6f42c1 !important;
        }

        /* Botón primario */
        button.btn-primary {
            background-color: #6f42c1 !important;
            border-color: #6f42c1 !important;
        }

        button.btn-primary:hover {
            background-color: #5a379d !important;
            border-color: #5a379d !important;
        }

        /* Enlace "Forgot Your Password?" */
        .btn-link {
            color: #6f42c1 !important;
            text-decoration: none !important;
        }

        .btn-link:hover {
            color: #5a379d !important;
            text-decoration: underline !important;
        }

        .btn-link:focus {
            outline: none !important;
            box-shadow: 0 0 5px #6f42c1 !important;
        }

        /* Corregir alineación de checkbox y texto */
        .form-check {
            display: flex;
            align-items: center;
        }

        .form-check-label {
            margin-left: 0.5em; /* Espacio entre checkbox y texto */
        }
    </style>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark text-light">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control bg-dark text-light @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control bg-dark text-light @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label text-light" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


