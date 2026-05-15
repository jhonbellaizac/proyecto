@extends('layouts.app')

@section('content')

<div class="container">

    <h1 class="mb-4 fw-bold">
        Venta
    </h1>

    {{-- MENSAJES --}}
    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif

    @if(session('error'))

        <div class="alert alert-danger">
            {{ session('error') }}
        </div>

    @endif

    <div class="card shadow border-0">

        <div class="card-body">

            <form action="{{ route('ventas.store') }}"
                  method="POST">

                @csrf

                {{-- CLIENTE --}}
                <div class="mb-3">

                    <label class="form-label">
                        Nombre Cliente
                    </label>

                    <input type="text"
                           name="nombre_cliente"
                           class="form-control"
                           required>

                </div>

                {{-- CEDULA --}}
                <div class="mb-3">

                    <label class="form-label">
                        C.C/NIT
                    </label>

                    <input type="text"
                           name="cedula_cliente"
                           class="form-control"
                           required>

                </div>

                {{-- PRODUCTOS --}}
                <div class="row g-2 align-items-end">

                    <div class="col-md-5">

                        <label class="form-label">
                            Producto
                        </label>

                        <select id="producto"
                                class="form-select">

                            @foreach($productos as $producto)

                                <option
                                    value="{{ $producto->id_producto }}"
                                    data-precio="{{ $producto->precio }}">

                                    {{ $producto->nombre }}
                                    -
                                    Stock: {{ $producto->stock }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-3">

                        <label class="form-label">
                            Cantidad
                        </label>

                        <input type="number"
                               id="cantidad"
                               class="form-control"
                               min="1">

                    </div>

                    <div class="col-md-4">

                        <button type="button"
                                onclick="agregarProducto()"
                                class="btn btn-primary w-100">

                            Agregar Producto

                        </button>

                    </div>

                </div>

                {{-- TABLA --}}
                <div class="table-responsive mt-4">

                    <table class="table table-bordered">

                        <thead class="table-dark">

                            <tr>

                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Subtotal</th>
                                <th>Acción</th>

                            </tr>

                        </thead>

                        <tbody id="tablaProductos">

                        </tbody>

                    </table>

                </div>

                {{-- TOTAL --}}
                <h3 class="mt-4">

                    Total:
                    $
                    <span id="total">
                        0
                    </span>

                </h3>

                <input type="hidden"
                       name="total_general"
                       id="total_general">

                <div id="inputsHidden"></div>

                {{-- BOTON --}}
                <button class="btn btn-success mt-3">

                    Registrar Venta

                </button>

            </form>

        </div>

    </div>

</div>

<script>

let total = 0;

function agregarProducto() {

    let producto = document.getElementById('producto');

    let cantidad = document.getElementById('cantidad').value;

    let nombre =
        producto.options[producto.selectedIndex].text;

    let precio =
        producto.options[producto.selectedIndex]
        .dataset.precio;

    let producto_id = producto.value;

    let subtotal = precio * cantidad;

    total += subtotal;

    document.getElementById('total')
        .innerText = total;

    document.getElementById('total_general')
        .value = total;

    let fila = `
        <tr>

            <td>${nombre}</td>

            <td>${cantidad}</td>

            <td>$${precio}</td>

            <td>$${subtotal}</td>

            <td>
                <button type="button"
                        class="btn btn-danger btn-sm">

                    X

                </button>
            </td>

        </tr>
    `;

    document.getElementById('tablaProductos')
        .innerHTML += fila;

    document.getElementById('inputsHidden')
        .innerHTML += `
            <input type="hidden"
                   name="productos[]"
                   value="${producto_id}">

            <input type="hidden"
                   name="cantidades[]"
                   value="${cantidad}">
        `;
}

</script>

@endsection