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

    <h1>List of Boulders</h1>
    <a class="btn btn-purple mb-3" href="{{ route('products.create') }}">Create a Boulder</a>
    @empty($products)
        <div class="alert alert-warning">
            No products found
        </div>
    @else
        <div class="table-responsive">
            <table class="table  table-bordered table-dark ">
                <thead class="table-dark"> <!-- Clase para fondo gris -->
                    <tr>
                        <th>Boulder ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Location</th>
                        <th>Grade</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->location }}</td>
                            <td>{{ $product->grade }}</td>
                            <td>{{ ucfirst($product->status) }}</td>
                            <td class="d-flex justify-content-between align-items-center">
                                <a class="btn btn-purple btn-sm me-2" href="{{ route('products.show', ['product' => $product->id]) }}">View</a>
                                <a class="btn btn-success btn-sm me-2" href="{{ route('products.edit', ['product' => $product->id]) }}">Edit</a>
                                <form method="POST" action="{{ route('products.destroy', ['product' => $product->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endempty
@endsection

