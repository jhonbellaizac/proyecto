<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Producto</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card shadow-lg border-0 rounded-3">
                    <div class="card-header bg-dark text-white text-center">
                        <h3 class="my-2">Registro de Producto</h3>
                    </div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('productos.store') }}">
                            @csrf

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
                                        <input type="text" name="nombre" id="nombre"
                                            class="form-control"
                                            placeholder="Nombre del producto"
                                            value="{{ old('nombre') }}" required>
                                        <label>Nombre del Producto</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="codigo" id="codigo"
                                            class="form-control"
                                            placeholder="Código"
                                            value="{{ old('codigo') }}" required>
                                        <label>Código / SKU</label>
                                    </div>
                                </div>
                            </div>

                            {{-- PRECIO Y STOCK --}}
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" step="0.01" name="precio" id="precio"
                                            class="form-control"
                                            placeholder="Precio"
                                            value="{{ old('precio') }}" required>
                                        <label>Precio</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" name="stock" id="stock"
                                            class="form-control"
                                            placeholder="Cantidad"
                                            value="{{ old('stock') }}" required>
                                        <label>Cantidad en Stock</label>
                                    </div>
                                </div>
                            </div>

                            {{-- CATEGORÍA --}}
                            <div class="form-floating mb-3">
                                <select name="categoria_id" class="form-select" required>
                                    <option value="">Seleccione una categoría</option>

                                    <option value="1" {{ old('categoria_id') == 1 ? 'selected' : '' }}>
                                        Cámaras
                                    </option>

                                    <option value="2" {{ old('categoria_id') == 2 ? 'selected' : '' }}>
                                        Alarmas
                                    </option>

                                    <option value="3" {{ old('categoria_id') == 3 ? 'selected' : '' }}>
                                        DVR
                                    </option>

                                    <option value="4" {{ old('categoria_id') == 4 ? 'selected' : '' }}>
                                        Monitores
                                    </option>

                                </select>
                                <label>Categoría</label>
                            </div>

                            {{-- DESCRIPCIÓN --}}
                            <div class="form-floating mb-4">
                                <textarea name="descripcion" class="form-control"
                                    placeholder="Descripción"
                                    style="height: 100px">{{ old('descripcion') }}</textarea>
                                <label>Descripción</label>
                            </div>

                            {{-- BOTONES --}}
                            <div class="d-grid gap-2">
                                <button class="btn btn-danger btn-lg">
                                    Guardar Producto
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