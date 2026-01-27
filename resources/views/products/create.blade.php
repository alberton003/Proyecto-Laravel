@extends('layouts.app')

@section('title', 'Entrada de datos')

@section('content')
    <div class="bg-white p-4 rounded shadow-sm">
        <h2>Alta de producto</h2>

        <form method="POST" action="{{ route('products.store') }}">
            @csrf

            {{-- Campo: Descripción --}}
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <input class="form-control" name="description" value="{{ old('description') }}">
            </div>

            {{-- Campo: Stock --}}
            <div class="mb-3">
                <label class="form-label">Stock</label>
                <input class="form-control" type="number" name="stock" value="{{ old('stock', 0) }}">
            </div>

            {{-- Campo: Precio --}}
            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input class="form-control" type="number" step="0.01" name="price" value="{{ old('price', 0) }}">
            </div>

            {{-- Campo: Categoría --}}
            <div class="mb-3">
                <label class="form-label">Categoría</label>
                <select class="form-select" name="category_id">
                    <option value="">-- elige --</option>
                    @foreach($categories as $c)
                        <option value="{{ $c->id }}" @selected(old('category_id') == $c->id)>
                            {{ $c->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection