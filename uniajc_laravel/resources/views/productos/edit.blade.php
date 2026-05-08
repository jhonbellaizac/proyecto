@extends('layouts.app')

@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

<body>


    <div class="container-fluid my-5 px-10 ">
        <div class="row justify-content-center">
            <div class="col-lg-8">




                <div class="card shadow-lg border-0 rounded-3">
                    <div class="card-header bg-dark text-white text-center">
                        <h3 class="my-2">
                            Editar Producto: {{ $producto->nombre }}
                        </h3>
                    </div>



                    <div class="card-body">

                        <form method="POST" action="{{ route('productos.update', $producto->id_producto) }}">
                            @csrf
                            @method('PUT')

                            {{-- ERRORES --}}
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            {{-- NOMBRE Y CÓDIGO --}}
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="nombre"
                                            class="form-control"
                                            value="{{ old('nombre', $producto->nombre) }}"
                                            required>
                                        <label>Nombre del Producto</label>
                                    </div>
                                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('productos.update', $producto->id_producto) }}">
                        @csrf
                        @method('PUT')

                        {{-- ERRORES --}}
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        {{-- NOMBRE Y CÓDIGO --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="nombre"
                                        class="form-control"
                                        value="{{ old('nombre', $producto->nombre) }}"
                                        required>
                                    <label>Nombre del Producto</label>
                                </div>
                            </div>



                            {{-- PRECIO Y STOCK --}}
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" step="0.01" name="precio"
                                            class="form-control"
                                            value="{{ old('precio', $producto->precio) }}"
                                            min="0"
                                            required>
                                        <label>Precio</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" name="stock"
                                            class="form-control"
                                            value="{{ old('stock', $producto->stock) }}"
                                            min="0"
                                            required>
                                        <label>Cantidad en Stock</label>
                                    </div>
                                </div>
                            </div>

                            {{-- MARCA --}}
                            <div class="form-floating mb-3">

                                <select name="marca_id" class="form-select" required>

                                    <option value="">
                                        Seleccione una marca
                                    </option>

                                    @foreach ($marcas as $marca)

                                    <option value="{{ $marca->id }}"
                                        {{
                    (old('marca_id') == $marca->id) ||
                    ($producto->marca_id == $marca->id && old('marca_id') == null)
                    ? 'selected' : ''
                }}>

                                        {{ $marca->nombre }}

                                    </option>

                                    @endforeach

                                </select>

                                <label>Marca</label>

                            </div>

                            {{-- CATEGORÍA --}}
                            <div class="form-floating mb-3">
                                <select name="categoria_id" class="form-select" required>
                                    <option value="">Seleccione una categoría</option>

                                    @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}"
                                        {{
                                            (old('categoria_id') == $categoria->id) ||
                                            ($producto->categoria_id == $categoria->id && old('categoria_id') == null)
                                            ? 'selected' : ''
                                        }}>
                                        {{ $categoria->nombre }}
                                    </option>
                                    @endforeach

                                </select>
                                <label>Categoría</label>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" name="stock"
                                        class="form-control"
                                        value="{{ old('stock', $producto->stock) }}"
                                        min="0"
                                        required>
                                    <label>Cantidad en Stock</label>
                                </div>
                            </div>
                        </div>

                        {{-- CATEGORÍA --}}
                        <div class="form-floating mb-3">
                            <select name="id_categoria" class="form-select" required>
                                <option value="">Seleccione una categoría</option>

                                @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}"
                                    {{
                                        (old('id_categoria') == $categoria->id) ||
                                        ($producto->id_categoria == $categoria->id && old('id_categoria') == null)
                                        ? 'selected' : ''
                                    }}>
                                    {{ $categoria->nombre }}
                                </option>
                                @endforeach

                            </select>
                            <label>Categoría</label>
                        </div>

                        {{-- DESCRIPCIÓN --}}
                        <div class="form-floating mb-4">
                            <textarea name="descripcion" class="form-control"
                                style="height: 100px">{{ old('descripcion', $producto->descripcion) }}</textarea>
                            <label>Descripción</label>
                        </div>

                        {{-- BOTONES --}}
                        <div class="d-grid gap-2">
                            <button class="btn btn-danger btn-lg">
                                Actualizar Producto
                            </button>

                                <a href="{{ route('productos.index') }}" class="btn btn-secondary">
                                    Cancelar
                                </a>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

@endsection
