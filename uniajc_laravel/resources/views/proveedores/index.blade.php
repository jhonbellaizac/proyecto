<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Proveedores</title>

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

        <h1 class="mb-4">Proveedores Registrados</h1>

        <a href="{{ route('proveedores.create') }}" class="btn btn-success mb-3">
            + Nuevo Proveedor
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
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Fecha Creación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($proveedores as $proveedor)
                    <tr>
                        <td>{{ $proveedor->id }}</td>
                        <td>{{ $proveedor->nombre }}</td>
                        <td>{{ $proveedor->email ?? 'N/A' }}</td>
                        <td>{{ $proveedor->telefono ?? 'N/A' }}</td>
                        <td>{{ $proveedor->direccion ?? 'N/A' }}</td>
                        <td>{{ $proveedor->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <a href="{{ route('proveedores.edit', $proveedor->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('proveedores.destroy', $proveedor->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Estás seguro de eliminar este proveedor?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">No hay proveedores registrados</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>