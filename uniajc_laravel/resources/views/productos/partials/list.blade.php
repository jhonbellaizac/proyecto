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

                <td>
                    {{ $producto->categoria->nombre ?? 'Sin categoría' }}
                </td>

                <td class="text-center">
                    @if($producto->id)
                    <a href="{{ route('productos.edit', $producto->id) }}"
                        class="btn btn-sm btn-warning me-2">
                        Editar
                    </a>
                    @endif

                    @if($producto->id)
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
                    @endif
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