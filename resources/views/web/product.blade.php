<x-layout>
    <x-slot name="title">{{ $product->name }}</x-slot>

    @if(session('error'))
        <div class="container mt-4">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <div class="container my-5">
        <div class="row g-5 align-items-start">
            <div class="col-md-6">
                <div class="bg-white shadow rounded p-3">
                    <img src="{{ $product->image_url ?? 'https://via.placeholder.com/500x500' }}"
                        class="img-fluid rounded w-100" alt="{{ $product->name }}">
                </div>
                <div class="mt-3">
                    <span class="badge bg-dark text-uppercase">{{ $product->category->name ?? 'Tanpa Kategori' }}</span>
                </div>
            </div>

            <div class="col-md-6">
                <h1 class="mb-2 fw-bold">{{ $product->name }}</h1>

                <div class="mb-3">
                    <span class="fs-4 text-success fw-semibold">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                    @if($product->old_price)
                        <span class="text-muted text-decoration-line-through ms-2">
                            Rp {{ number_format($product->old_price, 0, ',', '.') }}
                        </span>
                    @endif
                </div>

                <div class="mb-4 text-muted">
                    <p>{{ $product->description }}</p>
                </div>

                <!-- Informasi Tambahan -->
                <ul class="list-group list-group-flush mb-4">
                    <li class="list-group-item d-flex justify-content-between">
                        <strong>Stok:</strong>
                        <span class="{{ $product->stock > 0 ? 'text-success' : 'text-danger' }}">
                            {{ $product->stock > 0 ? $product->stock : 'Habis' }}
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <strong>Kategori:</strong>
                        <span>{{ $product->category->name ?? '-' }}</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Deskripsi Panjang -->
        <div class="row mt-5">
            <div class="col-12">
                <h4 class="mb-3">Deskripsi Produk</h4>
                <div class="bg-light p-4 rounded shadow-sm">
                    {!! nl2br(e($product->long_description ?? $product->description)) !!}
                </div>
            </div>
        </div>
    </div>

    <!-- Produk Terkait -->
    <div class="container my-5">
        <h3 class="mb-4">Produk Lainnya</h3>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            @forelse($relatedProducts as $relatedProduct)
                <div class="col">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ $relatedProduct->image_url ?? 'https://via.placeholder.com/350x200?text=No+Image' }}"
                            class="card-img-top" alt="{{ $relatedProduct->name }}"
                            style="object-fit: cover; height: 180px;">

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $relatedProduct->name }}</h5>
                            <p class="card-text text-muted small text-truncate">{{ $relatedProduct->description }}</p>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <span class="fw-bold" style="color: #FFA500;">
                                    Rp {{ number_format($relatedProduct->price, 0, ',', '.') }}
                                </span>
                                <a href="{{ route('product.show', $relatedProduct->slug) }}"
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
                    <div class="alert alert-info">Tidak ada produk terkait.</div>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>