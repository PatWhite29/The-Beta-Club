@extends('layouts.app')

@section('content')
    <h1 class="mb-4" >Welcome to The Beta Club</h1>

    <div class="mb-4">
        <p class="lead small">
            Welcome to our platform, a tool created by climbers for climbers. Our website is designed to provide you with all the information you need about climbing routes in Guadalajara, Jalisco, Mexico. Whether you're a beginner looking for your first experience or an experienced climber searching for new challenges, you'll find the perfect space for you here.
        </p>
        <p class="lead small">
            On our platform, you can explore a wide variety of climbing routes, each with its own description, difficulty grade, location, and features. You'll also be able to log the routes you've climbed, track your progress, and share your experiences with other climbers. Additionally, we offer an advanced filtering system to help you find routes based on your preferences, such as terrain type, difficulty, or specific location.
        </p>
        <p class="lead small">
            Our goal is to create a community of climbers where you can connect with others, share tips, and discover new routes you might not have known about. The platform is constantly updated with new routes and features, so there will always be something new to explore. Join us and take your passion for climbing to a whole new level.
        </p>
        <h1 class="mb-4" style="color: #6f42c1;">Some of our popular Boulders & Routes:</h1>

    </div>

    @empty($products)
        <div class="alert alert-warning">
            No boulders available
        </div>
    @else
        <div class="row gy-4">
            @foreach ($products as $product)
                <div class="col-12 col-md-6 col-lg-4">
                    @include('components.product-card')
                </div>
            @endforeach
        </div>
    @endempty
@endsection
