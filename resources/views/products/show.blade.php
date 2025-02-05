@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            @include('components.product-card')
        </div>
    </div>
</div>
@endsection
