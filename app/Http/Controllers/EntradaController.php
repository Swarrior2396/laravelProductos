<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Proveedor;
use App\Models\Producto;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    public function index()
    {
        $entradas = Entrada::with(['proveedor', 'producto'])->get();
        return view('entradas.index', compact('entradas'));
    }

    public function create()
    {
        $proveedores = Proveedor::all();
        $productos = Producto::all();
        return view('entradas.create', compact('proveedores', 'productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_proveedor' => 'required|exists:proveedores,nit',
            'id_producto' => 'required|exists:productos,id',
            'factura_compra' => 'required|string|max:255',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0'
        ]);
            
        // Calcular el total
        $total = $request->cantidad * $request->precio_unitario;

        Entrada::create([
            'id_proveedor' => $request->id_proveedor,
            'id_producto' => $request->id_producto,
            'factura_compra' => $request->factura_compra,
            'cantidad' => $request->cantidad,
            'precio_unitario' => $request->precio_unitario,
            'total' => $total
        ]);

        // Actualiza el stock del producto
        $producto = Producto::find($request->id_producto);
        $producto->stock += $request->cantidad;
        $producto->save();

        return redirect()->route('entradas.index')
            ->with('success', 'Entrada registrada correctamente');
    }

    public function show(Entrada $entrada)
    {
        return view('entradas.show', compact('entrada'));
    }

    public function edit(Entrada $entrada)
    {
        $proveedores = Proveedor::all();
        $productos = Producto::all();
        return view('entradas.edit', compact('entrada', 'proveedores', 'productos'));
    }

    public function update(Request $request, Entrada $entrada)
    {
        $request->validate([
            'id_proveedor' => 'required|exists:proveedores,id',
            'id_producto' => 'required|exists:productos,id',
            'factura_compra' => 'required|string|max:255',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0'
        ]);

        // Restaurar el stock anterior
        $producto = Producto::find($entrada->id_producto);
        $producto->stock -= $entrada->cantidad;
        
        // Actualizar la entrada
        $total = $request->cantidad * $request->precio_unitario;
        $entrada->update([
            'id_proveedor' => $request->id_proveedor,
            'id_producto' => $request->id_producto,
            'factura_compra' => $request->factura_compra,
            'cantidad' => $request->cantidad,
            'precio_unitario' => $request->precio_unitario,
            'total' => $total
        ]);

        // Actualizar el stock con la nueva cantidad
        $producto = Producto::find($request->id_producto);
        $producto->stock += $request->cantidad;
        $producto->save();

        return redirect()->route('entradas.index')
            ->with('success', 'Entrada actualizada correctamente');
    }

    public function destroy(Entrada $entrada)
    {
        // Restaurar el stock anterior
        $producto = Producto::find($entrada->id_producto);
        $producto->stock -= $entrada->cantidad;
        $producto->save();

        $entrada->delete();

        return redirect()->route('entradas.index')
            ->with('success', 'Entrada eliminada correctamente');
    }

    public function trashed()
    {
        $entradasEliminadas = Entrada::onlyTrashed()
            ->with(['proveedor', 'producto'])
            ->get();
        
        return view('entradas.trashed', compact('entradasEliminadas'));
    }
    
    public function restore($id)
    {
        $entrada = Entrada::onlyTrashed()->findOrFail($id);
        
        // Actualizar el stock del producto al restaurar la entrada
        $producto = Producto::find($entrada->id_producto);
        $producto->stock += $entrada->cantidad;
        $producto->save();
        
        $entrada->restore();
        
        return redirect()->route('entradas.trashed')
            ->with('success', 'Entrada restaurada correctamente');
    }
    
    public function forceDelete($id)
    {
        $entrada = Entrada::onlyTrashed()->findOrFail($id);
        $entrada->forceDelete();
        
        return redirect()->route('entradas.trashed')
            ->with('success', 'Entrada eliminada permanentemente');
    }

}