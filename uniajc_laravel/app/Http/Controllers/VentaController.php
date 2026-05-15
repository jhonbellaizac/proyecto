<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Venta;
use App\Models\DetalleVenta;
use App\Models\Producto;
use App\Models\Movimiento;

class VentaController extends Controller
{

    // INDEX
    public function index()
    {
        $ventas = Venta::with('user')
                    ->latest()
                    ->get();

        return view(
            'ventas.index',
            compact('ventas')
        );
    }

    // CREATE
    public function create()
    {
        $productos = Producto::all();

        return view(
            'ventas.create',
            compact('productos')
        );
    }

    // STORE
    public function store(Request $request)
    {
        $request->validate([

            'nombre_cliente' => 'required',

            'cedula_cliente' => 'required',

            'productos' => 'required',

            'cantidades' => 'required',

        ]);

        // CREAR VENTA
        $venta = Venta::create([

            'user_id' => Auth::id(),

            'cedula_cliente' =>
                $request->cedula_cliente,

            'nombre_cliente' =>
                $request->nombre_cliente,

            'total' =>
                $request->total_general

        ]);

        // RECORRER PRODUCTOS
        foreach ($request->productos as $index => $producto_id) {

            $producto = Producto::findOrFail(
                $producto_id
            );

            $cantidad =
                $request->cantidades[$index];

            // VALIDAR STOCK
            if ($producto->stock < $cantidad) {

                return back()->with(
                    'error',
                    'Stock insuficiente para ' .
                    $producto->nombre
                );
            }

            $subtotal =
                $producto->precio * $cantidad;

            // DETALLE VENTA
            DetalleVenta::create([

                'venta_id' =>
                    $venta->id_venta,

                'producto_id' =>
                    $producto->id_producto,

                'cantidad' => $cantidad,

                'precio_unitario' =>
                    $producto->precio,

                'subtotal' => $subtotal

            ]);

            // DESCONTAR STOCK
            $producto->stock -= $cantidad;

            $producto->save();

            // MOVIMIENTO
            Movimiento::create([

                'producto_id' =>
                    $producto->id_producto,

                'user_id' => Auth::id(),

                'tipo' => 'salida',

                'cantidad' => $cantidad,

                'descripcion' =>
                    'Venta registrada'

            ]);
        }

        return redirect()
            ->route('ventas.index')
            ->with(
                'success',
                'Venta registrada correctamente'
            );
    }

    // FACTURA
    public function factura($id)
    {
        $venta = Venta::with([
            'detalles.producto',
            'user'
        ])->findOrFail($id);

        return view(
            'ventas.factura',
            compact('venta')
        );
    }

}