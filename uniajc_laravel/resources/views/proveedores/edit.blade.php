<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Proveedor</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card shadow-lg border-0 rounded-3">
                    <div class="card-header bg-dark text-white text-center">
                        <h3 class="my-2">
                            Editar Proveedor: {{ $proveedor->nombre }}
                        </h3>
                    </div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('proveedores.update', $proveedor->id) }}">
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

                            {{-- NOMBRE --}}
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input type="text" name="nombre" id="nombre"
                                        class="form-control"
                                        placeholder="Nombre del proveedor"
                                        value="{{ old('nombre', $proveedor->nombre) }}" required>
                                    <label>Nombre del Proveedor</label>
                                </div>
                            </div>

                            {{-- EMAIL Y TELÉFONO --}}
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" name="email" id="email"
                                            class="form-control"
                                            placeholder="Email del proveedor"
                                            value="{{ old('email', $proveedor->email) }}">
                                        <label>Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="telefono" id="telefono"
                                            class="form-control"
                                            placeholder="Teléfono del proveedor"
                                            value="{{ old('telefono', $proveedor->telefono) }}">
                                        <label>Teléfono</label>
                                    </div>
                                </div>
                            </div>

                            {{-- DIRECCIÓN --}}
                            <div class="mb-3">
                                <div class="form-floating">
                                    <textarea name="direccion" id="direccion"
                                        class="form-control"
                                        placeholder="Dirección del proveedor"
                                        style="height: 100px">{{ old('direccion', $proveedor->direccion) }}</textarea>
                                    <label>Dirección</label>
                                </div>
                            </div>

                            {{-- BOTONES --}}
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('proveedores.index') }}" class="btn btn-secondary me-md-2">Cancelar</a>
                                <button type="submit" class="btn btn-success">Actualizar Proveedor</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>