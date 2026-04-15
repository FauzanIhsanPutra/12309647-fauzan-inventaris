@extends('layout.template')

@section('content')
<div class="d-flex vh-100">

    <!-- LEFT SIDE (Branding) -->
    <div class="d-flex flex-column justify-content-center align-items-center text-white"
        style="width: 50%; background: linear-gradient(135deg, #0d6efd, #0a58ca);">

        <h1 class="fw-bold mb-3">Inventory System</h1>
        <p class="text-center px-4">
            Kelola peminjaman barang, data user, dan inventaris sekolah dengan mudah dan cepat.
        </p>

    </div>

    <!-- RIGHT SIDE (Action) -->
    <div class="d-flex flex-column justify-content-center align-items-center bg-light"
        style="width: 50%;">

        <div class="text-center" style="max-width: 350px;">
            <h2 class="mb-3">Welcome Back 👋</h2>
            <p class="text-muted mb-4">
                Silakan login untuk melanjutkan ke dashboard.
            </p>

            <a href="{{ route('login') }}" class="btn btn-primary w-100 mb-3">
                Login
            </a>

            {{-- Optional kalau ada register --}}
            {{-- <a href="{{ route('register') }}" class="btn btn-outline-secondary w-100">
                Register
            </a> --}}
        </div>

    </div>

</div>
@endsection