<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>

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

        <h1 class="mb-4">Productos Registrados</h1>

        <!--
<a href="{{ route('productos.create') }}" class="btn btn-success mb-3">
    + Nuevo Producto
</a>
-->

        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">

                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Código</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->codigo }}</td>
                        <td>$ {{ number_format($producto->precio, 2) }}</td>

                        <td>
                            @if($producto->stock <= 5)
                                <span class="badge bg-danger">
                                {{ $producto->stock }} (Bajo)
                                </span>
                                @else
                                <span class="badge bg-success">
                                    {{ $producto->stock }}
                                </span>
                                @endif
                        </td>

                        <td class="text-center">
                            <a href="{{ route('productos.edit', $producto->id) }}"
                                class="btn btn-sm btn-warning me-2">
                                Editar
                            </a>

                            <form action="{{ route('productos.destroy', $producto->id) }}"
                                method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Eliminar producto {{ $producto->nombre }}?')">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>

</body>

</html>