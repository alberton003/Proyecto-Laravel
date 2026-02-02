@extends('layouts.app')

@section('title', 'Nuevo Producto')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-custom p-4">
            <div class="border-bottom mb-4 pb-3">
                <h2 class="fw-bold text-dark m-0">
                    <i class="bi bi-pencil-fill text-primary me-2"></i>Alta de Producto
                </h2>
                <p class="text-muted small">Completa los datos para registrar un nuevo artículo en el inventario.</p>
            </div>

            <form method="POST" action="{{ route('products.store') }}">
                @csrf

                {{-- Campo: Descripción --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">Descripción del Producto</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i class="bi bi-info-circle"></i></span>
                        <input class="form-control border-start-0 ps-0" name="description" 
                               placeholder="Ej. Teclado Mecánico RGB" value="{{ old('description') }}">
                    </div>
                </div>

                <div class="row">
                    {{-- Campo: Stock --}}
                    <div class="col-md-6 mb-4">
                        <label class="form-label fw-semibold">Cantidad en Stock</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="bi bi-box-seam"></i></span>
                            <input class="form-control border-start-0 ps-0" type="number" name="stock" 
                                   value="{{ old('stock', 0) }}">
                        </div>
                    </div>

                    {{-- Campo: Precio --}}
                    <div class="col-md-6 mb-4">
                        <label class="form-label fw-semibold">Precio de Venta</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 fw-bold">€</span>
                            <input class="form-control border-start-0 ps-0" type="number" step="0.01" name="price" 
                                   placeholder="0.00" value="{{ old('price', 0) }}">
                        </div>
                    </div>
                </div>

                {{-- Campo: Categoría --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">Categoría</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i class="bi bi-tags"></i></span>
                        <select class="form-select border-start-0 ps-0" name="category_id">
                            <option value="">-- Selecciona una categoría --</option>
                            @foreach($categories as $c)
                                <option value="{{ $c->id }}" @selected(old('category_id') == $c->id)>
                                    {{ $c->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
                    <a href="{{ route('products.index') }}" class="btn btn-light px-4">Cancelar</a>
                    <button class="btn btn-primary px-5 shadow-sm">
                        <i class="bi bi-cloud-arrow-up me-2"></i>Guardar Producto
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection