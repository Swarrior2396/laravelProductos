<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = Proveedor::all();
        return view('proveedores.index', compact('proveedores'));
    }

    public function create()
    {
        return view('proveedores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nit' => 'required|unique:proveedores,nit',
            'digito_verificacion' => 'required|numeric',
            'nombre' => 'required|string',
            'correo' => 'required|email|unique:proveedores,correo',
            'telefono' => 'required|string',
            'direccion' => 'required|string',
        ]);

        Proveedor::create($request->all());

        return redirect()->route('proveedores.index')->with('success', 'Proveedor agregado correctamente.');
    }

    public function show($nit)
    {
        $proveedor = Proveedor::where('nit', $nit)->firstOrFail();
        return view('proveedores.show', compact('proveedor'));
    }

    public function edit($nit)
    {
        $proveedor = Proveedor::where('nit', $nit)->firstOrFail();
        return view('proveedores.edit', compact('proveedor'));
    }

    public function update(Request $request, $nit)
    {
        $proveedor = Proveedor::where('nit', $nit)->firstOrFail();

        $request->validate([
            'digito_verificacion' => 'required|size:1',
            'nombre' => 'required',
            'correo' => 'required|email|unique:proveedores,correo,' . $proveedor->nit . ',nit',
            'telefono' => 'required',
            'direccion' => 'required',
        ]);

        $proveedor->update($request->all());

        return redirect()->route('proveedores.index')->with('success', 'Proveedor actualizado correctamente.');
    }

    public function destroy($nit)
    {
        $proveedor = Proveedor::where('nit', $nit)->firstOrFail();
        $proveedor->delete();

        return redirect()->route('proveedores.index')->with('success', 'Proveedor eliminado correctamente.');
    }

    public function trashed()
    {
        $proveedores = Proveedor::onlyTrashed()->get();
        return view('proveedores.trashed', compact('proveedores'));
    }

    public function restore($nit)
    {
        Proveedor::withTrashed()->where('nit', $nit)->restore();
        return redirect()->route('proveedores.index')->with('success', 'Proveedor restaurado correctamente.');
    }

    public function forceDelete($nit)
    {
        Proveedor::withTrashed()->where('nit', $nit)->forceDelete();
        return redirect()->route('proveedores.trashed')->with('success', 'Proveedor eliminado definitivamente.');
    }
}
