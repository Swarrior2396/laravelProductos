<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'dni' => 'required|unique:clientes,dni',
            'nombre' => 'required',
            'correo' => 'required|email|unique:clientes,correo',
            'telefono' => 'required',
            'fecha_registro' => 'required|date',
        ]);

        Cliente::create($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente agregado correctamente.');
    }

    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required|email|unique:clientes,correo,' . $cliente->dni . ',dni',
            'telefono' => 'required',
            'fecha_actualizacion' => 'nullable|date',
        ]);

        $cliente->update($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente.');
    }

    public function destroy($dni)
    {
        $cliente = Cliente::findOrFail($dni);
        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado correctamente.');
    }

    public function trashed()
    {
        $clientes = Cliente::onlyTrashed()->get();
        return view('clientes.trashed', compact('clientes'));
    }

    public function restore($dni)
    {
        Cliente::withTrashed()->where('dni', $dni)->restore();
        return redirect()->route('clientes.index')->with('success', 'Cliente restaurado correctamente.');
    }

    public function forceDelete($dni)
    {
        Cliente::withTrashed()->where('dni', $dni)->forceDelete();
        return redirect()->route('clientes.trash')->with('success', 'Cliente eliminado definitivamente.');
    }
}
