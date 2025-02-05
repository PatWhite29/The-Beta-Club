@extends('layouts.app')

@section('content')
    <style>
        .btn-purple {
            background-color: #6f42c1; /* Morado */
            color: white; /* Texto blanco */
            border-color: #6f42c1;
        }

        .btn-purple:hover {
            background-color: #5a32a3; /* Morado más oscuro */
        }
    </style>
    
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header custom-bg-purple text-white">
            <h2 class="text-center">Edit a Boulder</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('products.update', ['product' => $product->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name" class="font-weight-bold">Name</label>
                    <input 
                        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" 
                        type="text" 
                        name="name" 
                        id="name" 
                        value="{{ old('name') ?? $product->name }}" 
                        placeholder="Enter the route's name" 
                        required
                    >
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="description" class="font-weight-bold">Description</label>
                    <input 
                        class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" 
                        type="text" 
                        name="description" 
                        id="description" 
                        value="{{ old('description') ?? $product->description }}" 
                        placeholder="Enter a brief description" 
                        required
                    >
                    @if ($errors->has('description'))
                        <div class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="grade" class="font-weight-bold">Grade</label>
                    <input 
                        class="form-control {{ $errors->has('grade') ? 'is-invalid' : '' }}" 
                        type="text" 
                        name="grade" 
                        id="grade" 
                        value="{{ old('grade') ?? $product->grade }}" 
                        placeholder="Enter the difficulty grade" 
                        required
                    >
                    @if ($errors->has('grade'))
                        <div class="invalid-feedback">
                            {{ $errors->first('grade') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="location" class="font-weight-bold">Location</label>
                    <input 
                        class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}" 
                        type="text" 
                        name="location" 
                        id="location" 
                        value="{{ old('location') ?? $product->location }}" 
                        placeholder="Enter the location" 
                        required
                    >
                    @if ($errors->has('location'))
                        <div class="invalid-feedback">
                            {{ $errors->first('location') }}
                        </div>
                    @endif
                </div>

                <div class="form-group row">
                    <label for="images" class="font-weight-bold">Images</label>
                    <div class="custom-file">
                        <input 
                            type="file" 
                            accept="image/*" 
                            name="images[]" 
                            class="custom-file-input" 
                            multiple
                        >
                        <label class="custom-file-label"></label>
                    </div>
                    @if ($errors->has('images'))
                        <div class="invalid-feedback">
                            {{ $errors->first('images') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="status" class="font-weight-bold">Status</label>
                    <div class="btn-group btn-group-toggle d-flex" data-toggle="buttons">
                        <label class="btn btn-outline-success {{ (old('status') ?? $product->status) == 'available' ? 'active' : '' }} flex-fill">
                            <input 
                                type="radio" 
                                name="status" 
                                value="available" 
                                {{ (old('status') ?? $product->status) == 'available' ? 'checked' : '' }}> Available
                        </label>
                        <label class="btn btn-outline-danger {{ (old('status') ?? $product->status) == 'unavailable' ? 'active' : '' }} flex-fill">
                            <input 
                                type="radio" 
                                name="status" 
                                value="unavailable" 
                                {{ (old('status') ?? $product->status) == 'unavailable' ? 'checked' : '' }}> Unavailable
                        </label>
                    </div>
                    @if ($errors->has('status'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('status') }}
                        </div>
                    @endif
                </div>

                <div class="form-group text-center mt-4">
                    <button type="submit" class="btn btn-purple btn-lg px-5">Edit Boulder</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

<style>
    .custom-bg-purple {
        background-color: #6f42c1 !important; /* Nuevo morado */
    }
</style>

