<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Gestión Pro') | Laravel</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        /* Gradiente elegante para el header */
        .navbar-custom {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
        }
        /* Estilo de los botones del menú */
        .nav-link-custom {
            color: rgba(255,255,255,0.8);
            transition: all 0.3s ease;
            font-weight: 500;
            border-radius: 8px;
            padding: 8px 15px;
        }
        .nav-link-custom:hover {
            color: white;
            background: rgba(255,255,255,0.1);
            transform: translateY(-1px);
        }
        /* Tarjetas con sombra suave */
        .card-custom {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1);
        }
        footer {
            background: #1e293b;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom shadow-sm mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">
            <i class="bi bi-box-seam me-2"></i>ProductManager
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav ms-auto gap-2">
                <a class="nav-link-custom nav-link" href="{{ route('home') }}"><i class="bi bi-house-door me-1"></i> Inicio</a>
                <a class="nav-link-custom nav-link" href="{{ route('products.create') }}"><i class="bi bi-plus-circle me-1"></i> Nuevo</a>
                <a class="nav-link-custom nav-link" href="{{ route('products.index') }}"><i class="bi bi-list-ul me-1"></i> Listado</a>
                <a class="nav-link-custom nav-link" href="{{ route('products.filter.form') }}"><i class="bi bi-funnel me-1"></i> Filtros</a>
                <a class="nav-link-custom nav-link border border-light-subtle" href="{{ route('products.manage') }}"><i class="bi bi-gear me-1"></i> Gestión</a>
            </div>
        </div>
    </div>
</nav>

<main class="container mb-5">
    @if(session('ok'))
        <div class="alert alert-success alert-dismissible fade show card-custom mb-4" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('ok') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger card-custom mb-4" role="alert">
            <h5 class="alert-heading"><i class="bi bi-exclamation-triangle-fill me-2"></i> ¡Atención!</h5>
            <ul class="m-0">
                @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
            </ul>
        </div>
    @endif

    @yield('content')
</main>

<footer class="text-white py-4 mt-auto">
    <div class="container text-center">
        <p class="mb-1">Desarrollado con <i class="bi bi-heart-fill text-danger"></i> por Alberto Aragón Arjona</p>
        <small class="text-secondary">&copy; 2026 Sistema de Gestión de Inventario</small>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>