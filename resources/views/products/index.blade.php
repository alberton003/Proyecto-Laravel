@extends('layouts.app')

@section('title', 'Listado general')

@section('content')
    <div class="card card-custom p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-dark m-0">
                <i class="bi bi-grid-3x3-gap text-primary me-2"></i>Catálogo de Productos
            </h2>
            <a href="{{ route('products.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">
                <i class="bi bi-plus-lg me-1"></i> Añadir Producto
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="text-secondary py-3">ID</th>
                        <th class="text-secondary py-3">Descripción</th>
                        <th class="text-secondary py-3">Estado Stock</th>
                        <th class="text-secondary py-3 text-end">Precio</th>
                        <th class="text-secondary py-3">Categoría</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $p)
                        <tr>
                            <td class="fw-bold text-muted">#{{ $p->id }}</td>
                            <td>
                                <span class="fw-semibold text-dark">{{ $p->description }}</span>
                            </td>
                            <td>
                                @if($p->stock <= 5)
                                    <span class="badge rounded-pill bg-danger-subtle text-danger px-3">
                                        <i class="bi bi-exclamation-circle me-1"></i> Bajo: {{ $p->stock }}
                                    </span>
                                @else
                                    <span class="badge rounded-pill bg-success-subtle text-success px-3">
                                        <i class="bi bi-check2 me-1"></i> Stock: {{ $p->stock }}
                                    </span>
                                @endif
                            </td>
                            <td class="text-end fw-bold text-primary">
                                {{ number_format($p->price, 2) }} <small>€</small>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark border px-3">
                                    <i class="bi bi-tag-fill me-1 text-secondary"></i> {{ $p->category?->name ?? 'Sin categoría' }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                No se encontraron productos en el inventario.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection