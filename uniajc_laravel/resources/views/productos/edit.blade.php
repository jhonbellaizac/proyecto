<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">




                <div class="card shadow-lg border-0 rounded-3">
                    <div class="card-header bg-dark text-white text-center">
                        <h3 class="my-2">
                            Editar Producto: {{ $producto->nombre }}
                        </h3>
                    </div>



                    <div class="card-body">

                        <form method="POST" action="{{ route('productos.update', $producto->id) }}">
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

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="codigo"
                                            class="form-control"
                                            value="{{ old('codigo', $producto->codigo) }}"
                                            required>
                                        <label>Código / SKU</label>
                                    </div>
                                </div>
                            </div>

                            {{-- PRECIO Y STOCK --}}
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" step="0.01" name="precio"
                                            class="form-control"
                                            value="{{ old('precio', $producto->precio) }}"
                                            required>
                                        <label>Precio</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" name="stock"
                                            class="form-control"
                                            value="{{ old('stock', $producto->stock) }}"
                                            required>
                                        <label>Cantidad en Stock</label>
                                    </div>
                                </div>
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

</html>