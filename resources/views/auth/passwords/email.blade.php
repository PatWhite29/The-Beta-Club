@extends('layouts.app')

@section('content')
<div class="container">
    <style>
        /* Estilo oscuro para los inputs y campos interactivos */
        .form-control {
            background-color: #343a40 !important; /* Fondo oscuro */
            color: #f8f9fa !important; /* Texto claro */
            border: 1px solid #6c757d; /* Gris oscuro */
        }

        .form-control::placeholder {
            color: #adb5bd; /* Placeholder gris claro */
        }

        .form-control:focus {
            border-color: #6f42c1 !important; /* Borde púrpura */
            box-shadow: 0 0 5px #6f42c1 !important;
            outline: none !important;
            background-color: #3c4248 !important; /* Más oscuro en focus */
        }

        /* Botón primario oscuro */
        button.btn-primary {
            background-color: #6f42c1 !important; /* Púrpura */
            border-color: #6f42c1 !important;
            color: #ffffff !important;
        }

        button.btn-primary:hover {
            background-color: #5a379d !important; /* Púrpura más oscuro */
            border-color: #5a379d !important;
        }

        button.btn-primary:focus {
            box-shadow: 0 0 5px #6f42c1 !important;
            outline: none !important;
        }

        /* Tarjeta oscura */
        .card {
            background-color: #343a40 !important; /* Fondo oscuro */
            color: #f8f9fa !important; /* Texto claro */
        }

        .card-header {
            background-color: #3c4248 !important; /* Fondo más oscuro */
            color: #ffffff !important; /* Texto claro */
        }

        /* Alerta */
        .alert-success {
            background-color: #28a745 !important; /* Verde */
            color: #ffffff !important; /* Texto claro */
            border: none !important;
        }
    </style>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
