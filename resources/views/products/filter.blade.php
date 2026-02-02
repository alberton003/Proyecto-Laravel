@extends('layouts.app')

@section('title', 'Filtrar Inventario')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card card-custom p-4">
            <div class="text-center mb-4">
                <div class="bg-primary bg-opacity-10 p-3 rounded-circle d-inline-block mb-3">
                    <i class="bi bi-funnel fs-2 text-primary"></i>
                </div>
                <h2 class="fw-bold text-dark">Filtrar Productos</h2>
                <p class="text-muted">Selecciona un criterio para segmentar tu catálogo</p>
            </div>

            <form method="GET" action="{{ route('products.filter.results') }}">
                <div class="mb-4">
                    <label class="form-label fw-semibold">Criterio de Búsqueda</label>
                    <select class="form-select form-select-lg shadow-sm border-primary border-opacity-25" name="criterion">
                        <option value="low_stock">📉 Stock Crítico (<= 5 unidades)</option>
                        <option value="stock_gt_10">📦 Stock Abundante (> 10 unidades)</option>
                        <option value="price_lt_20">🏷️ Ofertas y Económicos (< 20€)</option>
                    </select>
                </div>

                <button class="btn btn-primary btn-lg w-100 shadow-sm">
                    <i class="bi bi-search me-2"></i>Aplicar Filtro
                </button>
            </form>
        </div>
    </div>
</div>
@endsection