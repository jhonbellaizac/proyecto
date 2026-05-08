@extends('layouts.app')

@php
use Illuminate\Support\Str;
@endphp

@section('content')

<div class="container-fluid my-5 px-10">

    
        <div class="d-flex justify-content-between align-items-center mb-4">



        <h1 class="fw-bold">
            Productos Registrados
        </h1>

        

        <a href="{{ route('productos.create') }}"
            class="btn btn-success">

            + Nuevo Producto

        </a>


    </div>

    <div class="mb-3">

            <input type="text"
                id="buscador"
                class="form-control"
                placeholder="Buscar producto por ID, nombre, marca o código...">

        </div>

    {{-- MENSAJE SUCCESS --}}
    @if (session('success'))

    <div class="alert alert-success alert-dismissible fade show">

        {{ session('success') }}

        <button type="button"
            class="btn-close"
            data-bs-dismiss="alert">
        </button>

    </div>

    @endif

    <div class="card shadow border-0">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-dark">

                        <tr>

                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>Código</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Categoría</th>
                            <th>Descripción</th>
                            <th class="text-center">Acciones</th>

                        </tr>

                    </thead>



                    <tbody id="tablaProductos">

                        @forelse ($productos as $producto)



                        <tr>

                            {{-- ID --}}
                            <td>
                                {{ $producto->id_producto }}
                            </td>

                            {{-- NOMBRE --}}
                            <td>
                                {{ $producto->nombre }}
                            </td>

                            {{-- MARCA --}}
                            <td>
                                {{ $producto->marca->nombre ?? 'Sin marca' }}
                            </td>

                            {{-- CÓDIGO --}}
                            <td>
                                {{ $producto->codigo }}
                            </td>

                            {{-- PRECIO --}}
                            <td>
                                $ {{ number_format($producto->precio, 2) }}
                            </td>

                            {{-- STOCK --}}
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

                            {{-- CATEGORÍA --}}
                            <td>
                                {{ $producto->categoria->nombre ?? 'Sin categoría' }}
                            </td>

                            {{-- DESCRIPCIÓN --}}
                            <td style="max-width: 250px;">
                                {{ Str::limit($producto->descripcion, 50) }}
                            </td>

                            {{-- ACCIONES --}}
                            <td class="text-center">

                                {{-- EDITAR --}}
                                <a href="{{ route('productos.edit', $producto->id_producto) }}"
                                    class="btn btn-warning btn-sm me-2">

                                    Editar

                                </a>

                                {{-- ELIMINAR --}}
                                <form action="{{ route('productos.destroy', $producto->id_producto) }}"
                                    method="POST"
                                    class="d-inline">


                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Deseas eliminar este producto?')">

                                        Eliminar

                                    </button>


                                </form>



                            </td>



                        </tr>





                        @empty

                        <tr>

                            <td colspan="8" class="text-center text-muted">

                                No hay productos registrados.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<script>
function normalizar(texto) {
    return texto
        .toLowerCase()
        .normalize("NFD")
        .replace(/[\u0300-\u036f]/g, "");
}

document.getElementById('buscador').addEventListener('keyup', function () {

    let filtro = normalizar(this.value);
    let filas = document.querySelectorAll("#tablaProductos tr");

    filas.forEach(fila => {

        let columnas = fila.querySelectorAll("td");

        if (columnas.length === 0) return;

        let id = normalizar(columnas[0].innerText);      // ID
        let nombre = normalizar(columnas[1].innerText);  // Nombre
        let marca = normalizar(columnas[2].innerText);   // Marca
        let codigo = normalizar(columnas[3].innerText);  // Código

        let textoBusqueda = id + " " + nombre + " " + marca + " " + codigo;

        if (textoBusqueda.includes(filtro)) {
            fila.style.display = "";
        } else {
            fila.style.display = "none";
        }

    });

});
</script>

@endsection