<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;

class ProductoController extends Controller
{
    public function index()
    {
        // 🔥 Trae productos con su categoría
        $productos = Producto::with('categoria')->get();

        

        return view('productos.index', compact('productos'));

        
    }

    public function create()
    {
        $categorias = Categoria::all();
        $marcas = Marca::all();

        return view('productos.create', compact('categorias', 'marcas'));
    }

    public function store(Request $request)
    {

        $request->validate(
            [
                'marca_id' => 'required|exists:marcas,id',
                'nombre' => 'required',
                'codigo' => 'required|unique:producto,codigo',
                'precio' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0',
                'categoria_id' => 'required|exists:categorias,id'
            ],
            [
                'precio.min' => 'El precio no puede ser negativo.',
                'stock.min' => 'El stock no puede ser negativo.',
                'codigo.unique' => 'El código ya existe. Usa otro código único.',
                'codigo.required' => 'El campo código es obligatorio.',
                'categoria_id.exists' => 'La categoría seleccionada no es válida.',
                'categoria_id.required' => 'Debes seleccionar una categoría.',
                'marca_id.exists' => 'La marca seleccionada no es válida.',
                'marca_id.required' => 'Debes seleccionar una marca.'
            ]
        );

        Producto::create($request->all());

        return redirect()->route('productos.index')
            ->with('success', 'Producto creado correctamente');
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all();
        $marcas = Marca::all();

        return view('productos.edit', compact('producto', 'categorias', 'marcas'));
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $request->validate(
            [
                'marca_id' => 'required|exists:marcas,id',
                'nombre' => 'required',
                'codigo' => 'required|unique:producto,codigo,' . $id . ',id_producto',
                'precio' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0',
                'categoria_id' => 'required|exists:categorias,id',
                'descripcion' => 'nullable|string|max:500'

            ],
            [
                'precio.min' => 'El precio no puede ser negativo.',
                'stock.min' => 'El stock no puede ser negativo.',
                'codigo.unique' => 'El código ya existe. Usa otro código único.',
                'codigo.required' => 'El campo código es obligatorio.',
                'categoria_id.exists' => 'La categoría seleccionada no es válida.',
                'categoria_id.required' => 'Debes seleccionar una categoría.',
                'marca_id.exists' => 'La marca seleccionada no es válida.',
                'marca_id.required' => 'Debes seleccionar una marca.',
            ]
        );

        $producto->update($request->all());

        return redirect()->route('productos.index')
            ->with('success', 'Producto actualizado');
    }

    public function destroy($id)
    {
        Producto::destroy($id);

        return redirect()->route('productos.index')
            ->with('success', 'Producto eliminado');
    }

    /*   public function categoria()
{
    return $this->belongsTo(Categoria::class);
}*/
}
