@extends('layouts.app')

@section('content')


<div class="container my-5">

    <h1 class="mb-4">Productos Registrados</h1>

    <a href="{{ route('productos.create') }}" class="btn btn-success mb-3">
        + Nuevo Producto
    </a>

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
                    <th>Categoría</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($productos as $producto)
                <tr>
                    <td>{{ $producto->id_producto }}</td>
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

                    <td>
                        {{ $producto->categoria->nombre ?? 'Sin categoría' }}
                    </td>

                    <td class="text-center">
                        <a href="{{ route('productos.edit', $producto->id_producto) }}"
                            class="btn btn-sm btn-warning me-2">
                            Editar
                        </a>

                        <form action="{{ route('productos.destroy', $producto->id_producto) }}"
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
                @empty
                <tr>
                    <td colspan="7" class="text-center py-4">
                        No hay productos registrados.
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>

</div>

@endsection