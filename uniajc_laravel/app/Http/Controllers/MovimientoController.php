<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movimiento;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

class MovimientoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'producto_id' => 'required',
            'tipo' => 'required',
            'cantidad' => 'required|integer|min:1',
        ]);

        $producto = Producto::findOrFail($request->producto_id);

        // SALIDA
        // ⚠️ VALIDAR STOCK
        if ($request->tipo == 'salida') {
            if ($producto->stock < $request->cantidad) {
                return back()->with('error', 'No hay suficiente stock');
            }
            $producto->stock -= $request->cantidad;
        } else {
            $producto->stock += $request->cantidad;
        }

        $producto->save();

        Movimiento::create([
            'producto_id' => $request->producto_id,
            'user_id' => Auth::id(),
            'tipo' => $request->tipo,
            'cantidad' => $request->cantidad,
            'descripcion' => $request->descripcion
        ]);

        return back()->with(
            'success',
            'Movimiento registrado correctamente'
        );
    }

    public function index()
    {
        $movimientos = Movimiento::with('producto', 'user')
            ->latest()
            ->get();

        return view(
            'movimientos.index',
            compact('movimientos')
        );
    }

    public function create()
    {
        $productos = Producto::all();
        return view('movimientos.create', compact('productos'));
    }
}
