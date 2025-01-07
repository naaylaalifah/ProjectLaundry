<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Data Laundry</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ url('pelanggan',[]) }}">Data Pelanggan</a></li>
                                    <li><a class="dropdown-item" href="{{ url('pelanggan/create',[]) }}">Tambah Pelanggan</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="{{ url('barang',[]) }}">Data Barang</a></li>
                                    <li><a class="dropdown-item" href="{{ url('barang/create',[]) }}">Tambah Barang</a></li>
                                </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Data Administrasi</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ url('transaksi',[]) }}">Data Transaksi</a></li>
                                    <li><a class="dropdown-item" href="{{ url('transaksi/create',[]) }}">Tambah Transaksi</a></li>
                                </ul>
                        </li>  
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Laporan Laundry</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ url('barang/laporan/cetak',[]) }}">Laporan Barang</a></li>
                                    <li><a class="dropdown-item" href="{{ url('pelanggan/laporan/cetak',[]) }}">Laporan Pelanggan</a></li>
                                    <li><a class="dropdown-item" href="{{ url('transaksi/laporan/cetak',[]) }}">Laporan Transaksi</a></li>
                                </ul>
                        </li>
                        
                    @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            
            @if (Session::has('pesan'))
                <div class="alert alert-primary" role="alert">
                    {{
                        Session::get('pesan')
                    }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>
