<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar - FOOTLANE</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #422c00ff, #915e00ff, #ec9a00ff);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card-auth {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-radius: 16px;
            padding: 2rem;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
            color: #fff;
        }

        h2 {
            font-size: 1.8rem;
            text-align: center;
            margin-bottom: 0.5rem;
        }

        p {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #ccc;
        }

        .text-warning {
            color: #FFC107;
            font-weight: 600;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 0.75rem 1rem;
            margin-bottom: 1rem;
            border: none;
            border-radius: 8px;
            background: rgba(255,255,255,0.1);
            color: #fff;
            font-size: 1rem;
        }

        input::placeholder {
            color: #bbb;
        }

        .btn-orange {
            background-color: #FFC107;
            border: none;
            color: #000;
            padding: 0.75rem;
            width: 100%;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s ease;
            font-weight: 600;
        }

        .btn-orange:hover {
            background-color: #e0a800;
        }

        .alert {
            background-color: rgba(255, 0, 0, 0.2);
            color: #ffcccc;
            padding: 0.75rem;
            border-radius: 6px;
            margin-bottom: 1rem;
            text-align: center;
        }

        .invalid-feedback {
            color: #ff8080;
            font-size: 0.875rem;
            margin-top: -0.5rem;
            margin-bottom: 1rem;
        }

        .text-center {
            text-align: center;
            margin-top: 1rem;
        }

        .text-center a {
            color: #FFC107;
            text-decoration: none;
        }

        .text-center a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="card-auth">
        <h2>Buat Akun</h2>
        <p>Gabung ke <span class="text-warning">FOOTLANE</span> sekarang juga</p>

        @if(session('errorMessage'))
            <div class="alert">{{ session('errorMessage') }}</div>
        @endif

        <form method="POST" action="{{ route('customer.store_register') }}">
            @csrf

            <input type="text" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <input type="email" name="email" placeholder="Alamat Email" value="{{ old('email') }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <input type="password" name="password" placeholder="Kata Sandi" required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <input type="password" name="password_confirmation" placeholder="Konfirmasi Sandi" required>
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn-orange">Daftar</button>
        </form>

        <div class="text-center">
            <small>Sudah punya akun? <a href="{{ route('customer.login') }}">Masuk</a></small>
        </div>
    </div>
</body>
</html>