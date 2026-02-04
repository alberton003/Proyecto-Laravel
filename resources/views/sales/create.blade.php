@extends('layouts.app')

@section('title', 'Realizar Venta')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card card-custom p-4">
            <div class="text-center mb-4 border-bottom pb-3">
                <h2 class="fw-bold text-dark"><i class="bi bi-cart-check text-success me-2"></i>Nueva Venta</h2>
                <p class="text-muted">Selecciona el producto y la cantidad a vender</p>
            </div>

            <form method="POST" action="{{ route('sales.store') }}">
                @csrf
                <div class="mb-4">
                    <label class="form-label fw-semibold">Producto</label>
                    <select class="form-select" name="product_id" required>
                        <option value="">-- Selecciona un producto --</option>
                        @foreach($products as $p)
                            <option value="{{ $p->id }}">
                                {{ $p->description }} (Stock: {{ $p->stock }}) - {{ number_format($p->price, 2) }}€
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Cantidad a vender</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="bi bi-hash"></i></span>
                        <input type="number" name="quantity" class="form-control" min="1" required placeholder="0">
                    </div>
                </div>

                <button type="submit" class="btn btn-success btn-lg w-100 shadow-sm">
                    <i class="bi bi-bag-check me-2"></i>Confirmar Venta
                </button>
            </form>
        </div>
    </div>
</div>
@endsection