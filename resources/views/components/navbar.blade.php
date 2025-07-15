<div>
    <nav class="navbar navbar-expand-lg bg-white shadow-sm fixed-top py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="{{ asset('img/logo.png') }}" alt="Footlane Logo" height="45" class="me-2">
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                {{-- Navigation links --}}
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-lg-4 gap-2 align-items-center">
                    <li class="nav-item">
                        <a class="nav-link fw-semibold text-dark hover-orange" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold text-dark hover-orange" href="/categories">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold text-dark hover-orange" href="/products">Produk</a>
                    </li>

                    @if(auth()->guard('customer')->check())
                        <li class="nav-item dropdown">
                            <a class="btn btn-outline-dark dropdown-toggle" href="#" role="button" id="userDropdown"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::guard('customer')->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="#">Dashboard</a></li>
                                <li>
                                    <form method="POST" action="{{ route('customer.logout') }}">
                                        @csrf
                                        <button class="dropdown-item" type="submit">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="btn btn-outline-dark" href="{{ route('customer.login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary text-white" style="background-color: #E29812; border: none;"
                                href="{{ route('customer.register') }}">Register</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</div>