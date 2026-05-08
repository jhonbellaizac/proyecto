@extends('layouts.app')

@section('content')

<div class="container-fluid my-5 px-10">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1 class="fw-bold">
            movimientos de Inventario
        </h1>



    </div>

    {{-- MENSAJES --}}
    @if (session('success'))

    <div class="alert alert-success alert-dismissible fade show">

        {{ session('success') }}

        <button type="button"
            class="btn-close"
            data-bs-dismiss="alert">
        </button>

    </div>

    @endif

    @if (session('error'))

    <div class="alert alert-danger alert-dismissible fade show">

        {{ session('error') }}

        <button type="button"
            class="btn-close"
            data-bs-dismiss="alert">
        </button>

    </div>

    @endif

    <div class="card shadow border-0">

        <div class="card-body">

            <form action="{{ route('movimientos.store') }}"
                method="POST">

                @csrf

                {{-- BUSCAR PRODUCTO --}}
                <div class="mb-3">

                    <label class="form-label fw-bold">
                        Buscar Producto
                    </label>

                    <input type="text"
                        id="buscador"
                        class="form-control"
                        placeholder="Escribe ID o nombre del producto">

                    <select name="producto_id"
                        id="producto_id"
                        class="form-select mt-2"
                        required>

                        <option value="">
                            Seleccione un producto
                        </option>

                        @foreach ($productos as $producto)

                        <option value="{{ $producto->id_producto }}">
                            {{ $producto->id_producto }} -
                            {{ $producto->nombre }} -
                            Stock: {{ $producto->stock }} -
                            {{ $producto->codigo }}
                        </option>

                        @endforeach

                    </select>

                </div>

                {{-- TIPO DE MOVIMIENTO --}}
                <div class="mb-3">

                    <label class="form-label fw-bold">
                        Tipo de Movimiento
                    </label>

                    <select name="tipo"
                        class="form-select"
                        required>

                        <option value="entrada">
                            Entrada
                        </option>

                        <option value="salida">
                            Salida / Retiro
                        </option>

                    </select>

                </div>

                {{-- CANTIDAD --}}
                <div class="mb-3">

                    <label class="form-label fw-bold">
                        Cantidad
                    </label>

                    <input type="number"
                        name="cantidad"
                        class="form-control"
                        min="1"
                        required>

                </div>

                <!--{{-- DESCRIPCIÓN --}}
                <div class="mb-3">

                    <label class="form-label fw-bold">
                        Descripción
                    </label>

                    <input type="text"
                        name="descripcion"
                        class="form-control"
                        placeholder="Opcional">

                </div> -->

                {{-- BOTÓN --}}
                <button class="btn btn-danger w-100">

                    Guardar

                   </button>

               
                  <a href="{{ route('movimientos.index') }}"
                    class="btn btn-secondary w-100">

                        cancelar

                  </a>
                        

                    

            </form>

        </div>

    </div>

</div>

{{-- BUSCADOR JS --}}
<script>
    
function normalizar(texto) {
    return texto
        .toLowerCase()
        .normalize("NFD")
        .replace(/[\u0300-\u036f]/g, "");
}

document.getElementById('buscador').addEventListener('keyup', function () {

    let filtro = normalizar(this.value);
    let select = document.getElementById('producto_id');
    let options = select.options;

    for (let i = 0; i < options.length; i++) {

        let texto = normalizar(options[i].text);

        options[i].style.display = texto.includes(filtro) ? '' : 'none';
    }

});

</script>

@endsection