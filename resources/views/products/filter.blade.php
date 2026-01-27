@extends('layouts.app')

@section('title', 'Listado filtrado')

@section('content')
    <div class="bg-white p-4 rounded shadow-sm">
        <h2>Filtrar productos</h2>

        <form method="GET" action="{{ route('products.filter.results') }}">
            
            {{-- Selector de Criterio --}}
            <div class="mb-3">
                <label class="form-label">Criterio</label>
                <select class="form-select" name="criterion">
                    <option value="low_stock">Bajas cantidades (<= 5)</option>
                    <option value="stock_gt_10">Altas cantidades (> 10)</option>
                    <option value="price_lt_20">Precio barato (< 20)</option>
                </select>
            </div>

            <button class="btn btn-primary">Aplicar</button>
        </form>
    </div>
@endsection