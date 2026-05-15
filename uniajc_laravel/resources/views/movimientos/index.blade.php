@extends('layouts.app')

@section('content')

<div class="container-fluid my-5 px-10">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1 class="fw-bold">
            Historial de Movimientos de Inventario
        </h1>
        

        
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

    {{-- MENSAJE ERROR --}}
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

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-dark">

                        <tr>

                            <th>ID</th>
                            <th>Producto</th>
                            <th>Código</th>
                            <th>Usuario</th>
                            <th>Tipo</th>
                            <th>Cantidad</th>
                            <!-- <th>Descripción</th> -->
                            <th>Fecha</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($movimientos as $movimiento)

                        <tr>

                            {{-- ID --}}
                            <td>
                                {{ $movimiento->id }}
                            </td>

                            {{-- PRODUCTO --}}
                            <td>
                                {{ $movimiento->producto->nombre ?? 'Sin producto' }}
                            </td>

                            {{-- CÓDIGO --}}
                            <td>
                                {{ $movimiento->producto->codigo ?? 'Sin código' }}
                            </td>

                            {{-- USUARIO --}}
                            <td>
                                {{ $movimiento->user->name ?? 'Sistema' }}
                            </td>

                            {{-- TIPO --}}
                            <td>

                                @if($movimiento->tipo == 'entrada')

                                    <span class="badge bg-success">
                                        Entrada
                                    </span>

                                @else

                                    <span class="badge bg-danger">
                                        Salida
                                    </span>

                                @endif

                            </td>

                            {{-- CANTIDAD --}}
                            <td>
                                {{ $movimiento->cantidad }}
                            </td>

                           <!-- {{-- DESCRIPCIÓN --}}
                            <td>
                                {{ $movimiento->descripcion ?? '---' }}
                            </td> -->

                            {{-- FECHA --}}
                            <td>
                                {{ $movimiento->created_at->format('Y-m-d H:i') }}
                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="7" class="text-center text-muted">

                                No hay movimientos registrados.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection