<div class="card shadow-sm mb-4 bg-dark text-white" style="border-radius: 10px; overflow: hidden; border: 2px solid white;">
    <!-- Carousel Section -->
    <div id="carousel{{ $product->id }}" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($product->images as $image)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img src="{{ asset($image->path) }}" 
                         class="d-block w-100" 
                         style="max-height: 400px; object-fit: cover; border-bottom: 2px solid #ddd;">
                </div>
            @endforeach
        </div>
        <!-- Carousel Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{ $product->id }}" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel{{ $product->id }}" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Card Content Section -->
    <div class="card-body">
        <!-- Product Name -->
        <h4 class="text-start mb-2" style="color: #6f42c1;">
            <strong>{{ $product->name }}</strong>
        </h4>

        <!-- Grade -->
        <h5 class="text-start text-white mb-3">
            <strong>Grade: {{ $product->grade }}</strong>
        </h5>

        <!-- Description -->
        <p class="text-start text-white mb-3" style="font-size: 0.9rem;">
            {{ $product->description }}
        </p>

        <!-- Location and Status -->
        <div class="mt-3">
            <!-- Location -->
            <div class="d-flex align-items-start mb-2">
                <i class="bi bi-geo-alt-fill text-danger me-2"></i>
                <span class="text-white" style="font-weight: 500;">{{ $product->location }}</span>
            </div>

            <!-- Status -->
            <div class="d-flex align-items-start">
                <i class="bi bi-info-circle-fill text-primary me-2"></i>
                <span class="badge {{ $product->status === 'available' ? 'bg-success' : 'bg-secondary' }} text-light">
                    Status: {{ ucfirst($product->status) }}
                </span>
            </div>
        </div>
    </div>
</div>

