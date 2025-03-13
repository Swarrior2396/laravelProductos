<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable',
            'stock' => 'nullable|integer',
            'fecha_ingreso' => 'required|date',
        ]);

        Producto::create($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto agregado correctamente.');
    }

    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable',
            'stock' => 'nullable|integer',
            'fecha_ingreso' => 'required|date',
        ]);

        $producto->update($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente.');
    }

  
    public function trashed()
    {
        $productos = Producto::onlyTrashed()->get();
        return view('productos.trashed', compact('productos'));
    }
    
    public function restore($id)
    {
        Producto::withTrashed()->where('id', $id)->restore();
        return redirect()->route('productos.index')->with('success', 'Producto restaurado correctamente.');
    }

    public function forceDelete($id)
    {
        Producto::withTrashed()->where('id', $id)->forceDelete();
        return redirect()->route('productos.trashed')->with('success', 'Producto eliminado definitivamente.');
    }
}
