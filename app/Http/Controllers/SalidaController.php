<?php

namespace App\Http\Controllers;

use App\Models\Salida;
use App\Models\Producto;
use App\Models\Cliente;
use Illuminate\Http\Request;

class SalidaController extends Controller
{
    public function index()
    {
        $salidas = Salida::with(['cliente', 'producto'])->get();
        return view('salidas.index', compact('salidas'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $productos = Producto::all();
        return view('salidas.create', compact('clientes', 'productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_cliente' => 'required|exists:clientes,dni',
            'id_producto' => 'required|exists:productos,id',
            'factura_venta' => 'required|string|max:255',
            'cantidad' => 'required|integer|min:1',
        ]);

        // Verificar stock del producto
        $producto = Producto::find($request->id_producto);
        
        if (is_null($producto->stock) || $producto->stock <= 0) {
            return redirect()->back()->with('error', 'El producto no tiene stock disponible.');
        }

        if ($request->cantidad > $producto->stock) {
            return redirect()->back()->with('error', 'No puedes vender más productos de los que hay en stock.');
        }

        // Registrar la salida
        Salida::create([
            'id_cliente' => $request->id_cliente,
            'id_producto' => $request->id_producto,
            'factura_venta' => $request->factura_venta,
            'cantidad' => $request->cantidad,
            'fecha' => now() // Agrega la fecha actual
        ]);

        // Descontar del stock
        $producto->stock -= $request->cantidad;
        $producto->save();

        return redirect()->route('salidas.index')
            ->with('success', 'Salida registrada correctamente.');
    }

    public function show(Salida $salida)
    {
        return view('salidas.show', compact('salida'));
    }

    public function edit(Salida $salida)
    {
        $clientes = Cliente::all();
        $productos = Producto::all();
        return view('salidas.edit', compact('salida', 'clientes', 'productos'));
    }

    public function update(Request $request, Salida $salida)
    {
        $request->validate([
            'id_cliente' => 'required|exists:clientes,dni',
            'id_producto' => 'required|exists:productos,id',
            'factura_venta' => 'required|string|max:255',
            'cantidad' => 'required|integer|min:1'
        ]);

        $producto = Producto::find($request->id_producto);
        
        // Restaurar stock anterior antes de actualizar
        $producto->stock += $salida->cantidad;

        if ($request->cantidad > $producto->stock) {
            return redirect()->back()->with('error', 'No puedes vender más productos de los que hay en stock.');
        }

        // Actualizar salida
        $salida->update([
            'id_cliente' => $request->id_cliente,
            'id_producto' => $request->id_producto,
            'factura_venta' => $request->factura_venta,
            'cantidad' => $request->cantidad,
            'fecha' => now() // Agrega la fecha actual
        ]);

        // Descontar del stock actualizado
        $producto->stock -= $request->cantidad;
        $producto->save();

        return redirect()->route('salidas.index')
            ->with('success', 'Salida actualizada correctamente.');
    }

    public function destroy(Salida $salida)
    {
        $producto = Producto::find($salida->id_producto);
        
        // Restaurar stock antes de eliminar
        $producto->stock += $salida->cantidad;
        $producto->save();

        $salida->delete();

        return redirect()->route('salidas.index')
            ->with('success', 'Salida eliminada correctamente.');
    }

    public function trashed()
    {
        $salidas = Salida::onlyTrashed()
            ->with(['cliente', 'producto'])
            ->get();
        
        return view('salidas.trashed', compact('salidas'));
    }
    
    public function restore($id)
    {
        $salida = Salida::onlyTrashed()->findOrFail($id);
        
        // Restaurar stock del producto
        $producto = Producto::find($salida->id_producto);
        $producto->stock -= $salida->cantidad;
        $producto->save();
        
        $salida->restore();
        
        return redirect()->route('salidas.trashed')
            ->with('success', 'Salida restaurada correctamente.');
    }
    
    public function forceDelete($id)
    {
        $salida = Salida::onlyTrashed()->findOrFail($id);
        $salida->forceDelete();
        
        return redirect()->route('salidas.trashed')
            ->with('success', 'Salida eliminada permanentemente.');
    }
}
