<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provesor;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = Provesor::all();
        return view('proveedores.index', compact('proveedores'));
    }

    public function create()
    {
        return view('proveedores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:500'
        ]);

        Provesor::create($request->all());
        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor creado correctamente');
    }

    public function edit($id)
    {
        $proveedor = Provesor::findOrFail($id);
        return view('proveedores.edit', compact('proveedor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:500'
        ]);

        $proveedor = Provesor::findOrFail($id);
        $proveedor->update($request->all());

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor actualizado correctamente');
    }

    public function destroy($id)
    {
        Provesor::destroy($id);
        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor eliminado correctamente');
    }
}