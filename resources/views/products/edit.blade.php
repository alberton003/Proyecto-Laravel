@extends('layouts.app')

@section('title', 'Editar producto')

@section('content')
    <div class="bg-white p-4 rounded shadow-sm">
        <h2>Editar producto #{{ $product->id }}</h2>

        <form method="POST" action="{{ route('products.update', $product) }}">
            @csrf
            @method('PUT')

            {{-- Campo: Descripción --}}
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <input class="form-control" name="description" 
                       value="{{ old('description', $product->description) }}">
            </div>

            {{-- Campo: Cantidad --}}
            <div class="mb-3">
                <label class="form-label">Cantidad</label>
                <input class="form-control" type="number" name="stock" 
                       value="{{ old('stock', $product->stock) }}">
            </div>

            {{-- Campo: Precio --}}
            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input class="form-control" type="number" step="0.01" name="price" 
                       value="{{ old('price', $product->price) }}">
            </div>

            {{-- Campo: Categoría --}}
            <div class="mb-3">
                <label class="form-label">Categoría</label>
                <select class="form-select" name="category_id">
                    @foreach($categories as $c)
                        <option value="{{ $c->id }}" 
                                @selected(old('category_id', $product->category_id) == $c->id)>
                            {{ $c->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-primary">Guardar cambios</button>
        </form>
    </div>
@endsection