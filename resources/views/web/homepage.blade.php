<x-layout>
    <x-slot name="title">Homepage</x-slot>

    {{-- HERO SECTION --}}
    <section class="py-5" style="background-color: #fff; margin-top: 20px;">
        <div class="container">
            <div class="rounded-4 px-4 py-5 overflow-hidden" style="background: linear-gradient(135deg, #FFA500, #FF6A00);">
                <div class="row align-items-center">
                    <div class="col-md-6 text-white">
                        <h1 class="fw-bold mb-4" style="font-size: 2rem;">
                            Temukan jenis sepatu favoritmu<br>
                            untuk membantu kegiatan<br>
                            hari harimu
                        </h1>
                        <div class="d-flex gap-3">
                            <a href="#promo" class="btn btn-light shadow">Promo</a>
                            <a href="/products" class="btn btn-outline-light">Produk Kami</a>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <img src="{{ asset('img/fix.png') }}" alt="Hero Sepatu"
                            class="img-fluid" style="max-height: 350px; margin-right: 10px;">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- KATEGORI PRODUK --}}
    <section class="py-5 bg-white">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-semibold fs-4">Kategori Produk</h3>
                <a href="{{ url('/categories') }}" class="btn btn-outline-dark btn-sm">Lihat Semua</a>
            </div>
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">
                @foreach($categories as $category)
                    <div class="col">
                        <a href="{{ url('/category/' . $category->slug) }}" class="text-decoration-none text-dark">
                            <div class="card border-0 shadow-sm h-100 text-center p-3">
                                <div class="rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                                     style="width:70px;height:70px;background:#f2f2f2;">
                                    <img src="{{ $category->image }}" alt="{{ $category->name }}"
                                         style="width:40px; height:40px; object-fit:contain;">
                                </div>
                                <h6 class="fw-bold mb-1">{{ $category->name }}</h6>
                                <small class="text-muted text-truncate">{{ $category->description }}</small>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- KENAPA HARUS MEMBELI DI KAMI --}}
    <section class="py-5 bg-white">
        <div class="container text-center">
            <h3 class="fw-semibold mb-2" style="font-size: 1.7rem;">
                Kenapa Harus Membeli di Kami?
            </h3>
            <p class="text-muted mb-5">
                Kami memberikan jaminan kualitas, harga terbaik, dan produk terpercaya untuk setiap pelanggan FOOTLANE.
            </p>
            <div class="row row-cols-2 row-cols-md-4 g-4">
                <div class="col">
                    <div class="card border-0 shadow-sm h-100 text-center p-3">
                        <img src="{{ asset('img/guarantee.png') }}" alt="Bergaransi" class="mx-auto mb-3" style="width: 50px;">
                        <h6 class="fw-bold mb-1" style="color: #FFA500;">Bergaransi</h6>
                        <small class="text-muted">Produk dijamin bergaransi resmi dan dapat ditukar sesuai kebijakan.</small>
                    </div>
                </div>
                <div class="col">
                    <div class="card border-0 shadow-sm h-100 text-center p-3">
                        <img src="{{ asset('img/update.png') }}" alt="Update Produk" class="mx-auto mb-3" style="width: 50px;">
                        <h6 class="fw-bold mb-1" style="color: #FFA500;">Update Produk Terbaru</h6>
                        <small class="text-muted">Selalu ada koleksi sepatu terbaru dan tren terkini setiap saat.</small>
                    </div>
                </div>
                <div class="col">
                    <div class="card border-0 shadow-sm h-100 text-center p-3">
                        <img src="{{ asset('img/original.png') }}" alt="Original" class="mx-auto mb-3" style="width: 50px;">
                        <h6 class="fw-bold mb-1" style="color: #FFA500;">100% Original</h6>
                        <small class="text-muted">Kami hanya menjual produk asli, bukan tiruan atau KW.</small>
                    </div>
                </div>
                <div class="col">
                    <div class="card border-0 shadow-sm h-100 text-center p-3">
                        <img src="{{ asset('img/best-price.png') }}" alt="Harga Terbaik" class="mx-auto mb-3" style="width: 50px;">
                        <h6 class="fw-bold mb-1" style="color: #FFA500;">Garansi Harga Terbaik</h6>
                        <small class="text-muted">Harga dijamin bersaing dengan kualitas premium.</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- PRODUK KAMI --}}
    <section class="py-5 bg-light">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-semibold fs-4">Produk Kami</h3>
                <a href="{{ url('/products') }}" class="btn btn-outline-dark btn-sm">Lihat Semua</a>
            </div>
            <div class="row">
                @forelse($products as $product)
                    <div class="col-md-3 mb-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <img src="{{ $product->image_url ?? 'https://via.placeholder.com/350x200?text=No+Image' }}"
                                class="card-img-top"
                                style="height: 200px; object-fit: cover;"
                                alt="{{ $product->name }}">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text small text-truncate">{{ $product->description }}</p>
                                <div class="mt-auto d-flex justify-content-between align-items-center">
                                    <span class="fw-bold" style="color: #FF6A00;">
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </span>
                                    <a href="{{ route('product.show', $product->slug) }}"
                                    class="btn btn-sm"
                                    style="border: 1px solid #FF6A00; color: #FF6A00;">
                                    Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col">
                        <div class="alert alert-info">Belum ada produk yang tersedia.</div>
                    </div>
                @endforelse
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $products->links('vendor.pagination.simple-bootstrap-5') }}
            </div>
        </div>
    </section>
</x-layout>