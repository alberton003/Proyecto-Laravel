<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>@yield('title', 'proyecto')</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<header class="bg-dark text-white p-3">
<div class="container">
<h1 class="h4 m-0">proyecto Laravel</h1>
</div>
</header>
<nav class="bg-white border-bottom py-2">
<div class="container d-flex gap-2 flex-wrap">
<a class="btn btn-outline-primary" href="{{ route('home') }}">Inicio</a>
<a class="btn btn-outline-primary" href="{{ route('products.create') }}">Entrada de datos</a>
<a class="btn btn-outline-primary" href="{{ route('products.index') }}">Listado general</a>
<a class="btn btn-outline-primary" href="{{ route('products.filter.form') }}">Listado filtrado</a>
<a class="btn btn-outline-secondary" href="{{ route('products.manage') }}">Modificar/Borrar</a>
</div>
</nav>
<main class="container py-4">
@if(session('ok'))
<div class="alert alert-success">{{ session('ok') }}</div>
@endif
@if($errors->any())
<div class="alert alert-danger">
<ul class="m-0">
@foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
</ul>
</div>
@endif
@yield('content')
</main>
<footer class="bg-dark text-white py-3 mt-auto">
<div class="container">
<small>Hecho por Alberto Aragón Arjona</small>
</div>
</footer>
</body>
</html>