<x-layout>
    <x-slot name="title">Produk Kami</x-slot>

    <div class="container" style="padding-top: 80px;">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-semibold">Produk Kami</h3>
            <form action="{{ url()->current() }}" method="GET" class="d-flex" style="max-width: 320px;">
                <input type="text" name="search" class="form-control me-2" placeholder="Cari produk..." value="{{ request('search') }}">
                <button type="submit" class="btn" style="background-color: #FFA500; color: white;">
                    Cari
                </button>
            </form>
        </div>

        <!-- Produk -->
        <div class="row">
            @forelse($products as $product)
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ $product->image_url ?? 'https://via.placeholder.com/350x200?text=No+Image' }}"
                             class="card-img-top rounded-top"
                             alt="{{ $product->name }}"
                             style="object-fit: cover; height: 180px;">
                        
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-dark">{{ $product->name }}</h5>
                            <p class="card-text text-muted small mb-2 text-truncate">{{ $product->description }}</p>
                            
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <span class="fw-semibold" style="color: #FFA500;">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </span>
                                <a href="{{ route('product.show', $product->slug) }}"
                                   class="btn btn-sm"
                                   style="border: 1px solid #FFA500; color: #FFA500;">
                                    Lihat
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col">
                    <div class="alert alert-info text-center">Produk tidak ditemukan atau belum tersedia.</div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($products->hasPages())
            <div class="d-flex justify-content-center mt-4">
                {{ $products->links('vendor.pagination.simple-bootstrap-5') }}
            </div>
        @endif
    </div>
</x-layout>