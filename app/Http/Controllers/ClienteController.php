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
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:clientes',
            'telefono' => 'required|string|max:20',
            'direccion' => 'nullable|string',
            'tipo' => 'required|in:regular,preferencial,corporativo'
        ]);

        Cliente::create($request->all());

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente creado exitosamente.');
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
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:clientes,email,' . $cliente->id,
            'telefono' => 'required|string|max:20',
            'direccion' => 'nullable|string',
            'tipo' => 'required|in:regular,preferencial,corporativo'
        ]);

        $cliente->update($request->all());

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente actualizado exitosamente.');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente eliminado exitosamente.');
    }
}