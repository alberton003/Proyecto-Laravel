@extends('layouts.app')

@section('title', 'Gestión de Inventario')

@section('content')
    <div class="card card-custom p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold text-dark m-0">
                    <i class="bi bi-sliders text-primary me-2"></i>Panel de Control
                </h2>
                <p class="text-muted small mb-0">Modifica o elimina registros del sistema</p>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="py-3" style="width: 80px;">ID</th>
                        <th class="py-3">Producto</th>
                        <th class="py-3">Categoría</th>
                        <th class="py-3 text-center" style="width: 200px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $p)
                        <tr>
                            <td class="text-muted fw-bold">#{{ $p->id }}</td>
                            <td>
                                <div class="fw-semibold text-dark">{{ $p->description }}</div>
                            </td>
                            <td>
                                <span class="badge bg-light text-secondary border px-3">
                                    {{ $p->category?->name ?? 'Sin asignar' }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    {{-- Botón Editar con icono --}}
                                    <a class="btn btn-outline-warning btn-sm px-3 rounded-pill" 
                                       href="{{ route('products.edit', $p) }}" 
                                       title="Editar producto">
                                        <i class="bi bi-pencil-square me-1"></i> Editar
                                    </a>

                                    {{-- Formulario Borrar con icono y confirmación --}}
                                    <form method="POST" action="{{ route('products.destroy', $p) }}" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger btn-sm px-3 rounded-pill" 
                                                onclick="return confirm('¿Estás seguro de que deseas eliminar este producto? Esta acción no se puede deshacer.')">
                                            <i class="bi bi-trash3 me-1"></i> Borrar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection