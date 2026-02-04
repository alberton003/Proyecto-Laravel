@extends('layouts.app')

@section('title', 'Historial de Ventas')

@section('content')
    <div class="card card-custom p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-dark m-0">
                <i class="bi bi-receipt text-primary me-2"></i>Registro de Ventas
            </h2>
            <a href="{{ route('sales.create') }}" class="btn btn-success rounded-pill px-4 shadow-sm">
                <i class="bi bi-cart-plus me-1"></i> Nueva Venta
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="text-secondary py-3">ID Venta</th>
                        <th class="text-secondary py-3">Producto</th>
                        <th class="text-secondary py-3 text-center">Cantidad</th>
                        <th class="text-secondary py-3 text-end">Precio Unit.</th>
                        <th class="text-secondary py-3 text-end">Total</th>
                        <th class="text-secondary py-3 text-center">Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sales as $s)
                        <tr>
                            <td class="fw-bold text-muted">#{{ $s->id }}</td>
                            <td><span class="fw-semibold text-dark">{{ $s->product?->description }}</span></td>
                            <td class="text-center"><span class="badge bg-info-subtle text-info px-3">{{ $s->quantity }} uds</span></td>
                            <td class="text-end text-muted">{{ number_format($s->price, 2) }} €</td>
                            <td class="text-end fw-bold text-primary">{{ number_format($s->price * $s->quantity, 2) }} €</td>
                            <td class="text-center text-secondary small">{{ $s->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="bi bi-cart-x fs-1 d-block mb-2"></i>
                                Aún no se han realizado ventas.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection