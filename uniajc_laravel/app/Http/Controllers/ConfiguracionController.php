<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ConfiguracionController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('configuracion.index', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email,' . $user->id,
                'current_password' => 'required',
                'password' => 'nullable|min:6|confirmed',
            ],
            [
                'current_password.required' => 'La contraseña actual es obligatoria.',
                'password.confirmed' => 'La confirmación de la contraseña no coincide.',
                'password.min' => 'La nueva contraseña debe tener al menos 6 caracteres.',
            ]
        );

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'La contraseña actual es incorrecta');
        }

        
        $user->name = $request->name;
        $user->email = $request->email;

        if (!empty($request->password)) {
             $user->password = $request->password;
        }

        try {
            $user->save();
        } catch (\Exception $e) {
            return back()->with('error', 'Error al guardar: ' . $e->getMessage());
        }

        return back()->with('success', 'Datos actualizados correctamente');
    }
}