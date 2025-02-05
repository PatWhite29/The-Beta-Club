@extends('layouts.app')

@section('content')
<div class="container">
    <style>
        /* Estilo oscuro para los inputs y campos interactivos */
        .form-control, .custom-file-input {
            background-color: #343a40 !important; /* Oscuro */
            color: #f8f9fa !important; /* Texto claro */
            border: 1px solid #6c757d; /* Gris oscuro */
        }

        .form-control::placeholder {
            color: #adb5bd; /* Placeholder gris claro */
        }

        .form-control:focus, 
        .custom-file-input:focus {
            border-color: #6f42c1 !important; /* Púrpura */
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

        /* Custom File Input (oscuro y púrpura en focus) */
        .custom-file-input {
            background-color: #343a40 !important; /* Oscuro */
            color: #f8f9fa !important;
        }

        .custom-file-input:focus ~ .custom-file-label {
            border-color: #6f42c1 !important;
            box-shadow: 0 0 5px #6f42c1 !important;
        }

        .custom-file-label {
            background-color: #343a40 !important; /* Oscuro */
            color: #adb5bd !important; /* Placeholder gris claro */
        }
    </style>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark text-light">
                <div class="card-header">{{ __('Edit Your Profile') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $user->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <div class="custom-file">
                                    <input type="file" accept="image/*" name="image" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile"></label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
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
