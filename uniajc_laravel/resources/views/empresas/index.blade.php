<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Empresas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <a href="{{ route('menu') }}"
        style="
   position: fixed;
   top: 20px;
   left: 20px;
   background: white;
   border-radius: 50%;
   width: 80px;
   height: 50px;
   display:flex;
   align-items:center;
   justify-content:center;
   box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
   text-decoration:none;
   font-size: 99px;
   z-index: 9999;">
        ‹
    </a>

    <div class="container my-5">

        <h1 class="mb-4">Empresas Registradas</h1>

        <a href="{{ route('empresas.create') }}" class="btn btn-success mb-3">
            + Nueva Empresa
        </a>

        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>NIT</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Fecha Creación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($empresas as $empresa)
                    <tr>
                        <td>{{ $empresa->id }}</td>
                        <td>{{ $empresa->nombre }}</td>
                        <td>{{ $empresa->nit ?? 'N/A' }}</td>
                        <td>{{ $empresa->email ?? 'N/A' }}</td>
                        <td>{{ $empresa->telefono ?? 'N/A' }}</td>
                        <td>{{ $empresa->direccion ?? 'N/A' }}</td>
                        <td>{{ $empresa->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <a href="{{ route('empresas.edit', $empresa->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('empresas.destroy', $empresa->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Estás seguro de eliminar esta empresa?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">No hay empresas registradas</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>