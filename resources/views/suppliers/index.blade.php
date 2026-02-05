@extends('layouts.app')
@section('content')
<div class="card card-custom p-4">
    <h2 class="fw-bold mb-4"><i class="bi bi-truck text-primary me-2"></i>Proveedores</h2>
    
    {{-- Formulario rápido para rellenar --}}
    <form action="{{ route('suppliers.store') }}" method="POST" class="row g-3 mb-4">
        @csrf
        <div class="col-md-4"><input type="text" name="name" class="form-control" placeholder="Nombre" required></div>
        <div class="col-md-3"><input type="email" name="email" class="form-control" placeholder="Email"></div>
        <div class="col-md-3"><input type="text" name="phone" class="form-control" placeholder="Teléfono"></div>
        <div class="col-md-2"><button type="submit" class="btn btn-primary w-100">Añadir</button></div>
    </form>

    <table class="table table-hover">
        <thead><tr><th>Nombre</th><th>Email</th><th>Teléfono</th></tr></thead>
        <tbody>
            @foreach($suppliers as $s)
                <tr><td>{{ $s->name }}</td><td>{{ $s->email }}</td><td>{{ $s->phone }}</td></tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection