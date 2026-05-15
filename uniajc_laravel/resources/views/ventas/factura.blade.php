<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Factura</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>

        body{
            background:white;
            padding:40px;
            font-family: Arial;
        }

        .factura-box{
            max-width:900px;
            margin:auto;
            border:1px solid #ddd;
            padding:40px;
        }

        .titulo{
            font-size:32px;
            font-weight:bold;
        }

        @media print {

    .no-print{
        display:none !important;
    }

    body{
        padding:0;
    }

    .factura-box{
        border:none;
    }

}

    </style>

</head>

<body>

    <div class="factura-box">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between mb-4">

            <div>

                <h1 class="titulo">
                    FACTURA
                </h1>

                <p>
                    Venta #
                    {{ $venta->id_venta }}
                </p>

            </div>

            <div>

                <strong>Cliente:</strong>

                <br>

                {{ $venta->nombre_cliente }}

                <br>

                CC:
                {{ $venta->cedula_cliente }}

            </div>

        </div>

        <hr>

        {{-- TABLA --}}
        <table class="table table-bordered">

            <thead class="table-dark">

                <tr>

                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Subtotal</th>

                </tr>

            </thead>

            <tbody>

                @foreach($venta->detalles as $detalle)

                <tr>

                    <td>
                        {{ $detalle->producto->nombre }}
                    </td>

                    <td>
                        {{ $detalle->cantidad }}
                    </td>

                    <td>
                        $
                        {{ number_format($detalle->precio_unitario, 2) }}
                    </td>

                    <td>
                        $
                        {{ number_format($detalle->subtotal, 2) }}
                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

        {{-- TOTAL --}}
        <div class="text-end mt-4">

            <h2>

                TOTAL:
                $

                {{ number_format($venta->total, 2) }}

            </h2>

        </div>

        <hr>

        {{-- INFO --}}
        <div class="mt-4">

            <p>

                <strong>Vendedor:</strong>

                {{ $venta->user->name }}

            </p>

            <p>

                <strong>Fecha:</strong>

                {{ $venta->created_at }}

            </p>

        </div>

        {{-- BOTONES --}}
        <div class="mt-5 d-flex gap-2 no-print">

            <button onclick="window.print()"
                    class="btn btn-danger">

                Imprimir

            </button>

            <a href="{{ route('ventas.index') }}"
               class="btn btn-secondary">

                Volver

            </a>

        </div>

    </div>

</body>

</html>