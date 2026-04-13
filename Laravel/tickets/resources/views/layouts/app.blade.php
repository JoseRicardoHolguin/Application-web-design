<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Sistema de Tickets') - {{ config('app.name', 'Laravel') }}</title>

    <!-- Vite/Tailwind (si compilado) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Bootstrap 5 CDN (fallback rápido) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom styles -->
    <style>
        body { font-family: 'Nunito', sans-serif; }
    </style>
</head>
<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">Sistema de Tickets</a>
            <div class="navbar-nav ms-auto">
                @auth
                    {{-- MENÚ ADMIN --}}
                    @if(auth()->user()->rol === 'admin')
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <a class="nav-link" href="{{ route('admin.tickets.index') }}">Tickets</a>
                        <a class="nav-link" href="{{ route('admin.usuarios.index') }}">Usuarios</a>
                    @endif
                    {{-- MENÚ GERENTE --}}
                    @if(auth()->user()->rol === 'gerente')
                        <a class="nav-link" href="{{ route('gerente.dashboard') }}">Dashboard</a>
                        <a class="nav-link" href="{{ route('gerente.reportes') }}">Reportes</a>
                        <a class="nav-link" href="{{ route('gerente.tickets.index') }}">Tickets</a>
                    @endif
                    {{-- MENÚ USUARIO REGULAR --}}
                    @if(auth()->user()->rol === 'usuario')
                        <a class="nav-link" href="{{ route('usuario.dashboard') }}">Mi Panel</a>
                        <a class="nav-link" href="{{ route('usuario.tickets.index') }}">Mis Tickets</a>
                        <a class="nav-link" href="{{ route('usuario.tickets.create') }}">Nuevo Ticket</a>
                    @endif
                    {{-- PERFIL Y LOGOUT --}}
                    <span class="nav-link text-light">
                        {{ auth()->user()->name }}
                        <span class="badge bg-secondary ms-1">{{ ucfirst(auth()->user()->rol) }}</span>
                    </span>
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-light ms-2">Salir</button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>

    <main>
        {{-- Flash messages --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible m-3">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible m-3">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Content --}}
        @yield('content')
    </main>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

