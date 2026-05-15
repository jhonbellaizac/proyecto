@extends('layouts.app')

@section('content')

<div class="container my-5">

    <div class="d-flex justify-content-between mb-4">

        <h2 class="fw-bold">
            Historial de Ventas
        </h2>

        <a href="{{ route('ventas.create') }}"
            class="btn btn-success">

            Nueva Venta

        </a>

    </div>

    <div class="card shadow border-0">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover">

                    <thead class="table-dark">

                        <tr>

                            <th>#</th>
                            <th>Cliente</th>
                            <th>Cédula</th>
                            <th>Usuario</th>
                            <th>Total</th>
                            <th>Fecha</th>
                            <th>Factura</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($ventas as $venta)

                        <tr>

                            <td>
                                {{ $venta->id_venta }}
                            </td>

                            <td>
                                {{ $venta->nombre_cliente }}
                            </td>

                            <td>
                                {{ $venta->cedula_cliente }}
                            </td>

                            <td>
                                {{ $venta->user->name ?? 'N/A' }}
                            </td>

                            <td>
                                ${{ number_format($venta->total, 2) }}
                            </td>

                            <td>
                                {{ $venta->created_at }}
                            </td>

                            <td>

                                <a href="{{ route('ventas.factura', $venta->id_venta) }}"
                                    class="btn btn-primary btn-sm">

                                    Ver Factura

                                </a>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="6"
                                class="text-center">

                                No hay ventas registradas

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