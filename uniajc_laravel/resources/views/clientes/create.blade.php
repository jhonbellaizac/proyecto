<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Cliente</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card shadow-lg border-0 rounded-3">
                    <div class="card-header bg-dark text-white text-center">
                        <h3 class="my-2">Registro de Cliente</h3>
                    </div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('clientes.store') }}">
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

                            {{-- NOMBRE --}}
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input type="text" name="nombre" id="nombre"
                                        class="form-control"
                                        placeholder="Nombre del cliente"
                                        value="{{ old('nombre') }}" required>
                                    <label>Nombre del Cliente</label>
                                </div>
                            </div>

                            {{-- EMAIL Y TELÉFONO --}}
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" name="email" id="email"
                                            class="form-control"
                                            placeholder="Email del cliente"
                                            value="{{ old('email') }}">
                                        <label>Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="telefono" id="telefono"
                                            class="form-control"
                                            placeholder="Teléfono del cliente"
                                            value="{{ old('telefono') }}">
                                        <label>Teléfono</label>
                                    </div>
                                </div>
                            </div>

                            {{-- DIRECCIÓN --}}
                            <div class="mb-3">
                                <div class="form-floating">
                                    <textarea name="direccion" id="direccion"
                                        class="form-control"
                                        placeholder="Dirección del cliente"
                                        style="height: 100px">{{ old('direccion') }}</textarea>
                                    <label>Dirección</label>
                                </div>
                            </div>

                            {{-- BOTONES --}}
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('clientes.index') }}" class="btn btn-secondary me-md-2">Cancelar</a>
                                <button type="submit" class="btn btn-success">Guardar Cliente</button>
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