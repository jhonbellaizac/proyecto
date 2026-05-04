<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:usuarios',
            'password' => 'required|string|min:8',
            'rol' => 'required|string|max:50',
            'activo' => 'boolean',
            'id_empresa' => 'nullable|exists:empresas,id'
        ]);

        $data = $request->all();
        $data['fecha_creacion'] = now();

        Usuario::create($data);
        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario creado correctamente');
    }

    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:usuarios,username,' . $id . ',id_usuario',
            'password' => 'nullable|string|min:8',
            'rol' => 'required|string|max:50',
            'activo' => 'boolean',
            'id_empresa' => 'nullable|exists:empresas,id'
        ]);

        $usuario = Usuario::findOrFail($id);
        $data = $request->except('password');

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $usuario->update($data);

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy($id)
    {
        Usuario::destroy($id);
        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario eliminado correctamente');
    }
}