<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoría</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">

                <div class="card shadow-lg border-0 rounded-3">
                    <div class="card-header bg-dark text-white text-center">
                        <h3 class="my-2">
                            Editar Categoría: {{ $categoria->nombre }}
                        </h3>
                    </div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('categorias.update', $categoria->id) }}">
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
                                        placeholder="Nombre de la categoría"
                                        value="{{ old('nombre', $categoria->nombre) }}" required>
                                    <label>Nombre de la Categoría</label>
                                </div>
                            </div>

                            {{-- BOTONES --}}
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('categorias.index') }}" class="btn btn-secondary me-md-2">Cancelar</a>
                                <button type="submit" class="btn btn-success">Actualizar Categoría</button>
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