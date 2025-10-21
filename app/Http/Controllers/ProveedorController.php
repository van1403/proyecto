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
            'nombre' => 'required|string|max:255',
            'contacto' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'email' => 'required|email',
            'producto' => 'required|string|max:255',
            'direccion' => 'nullable|string'
        ]);

        Proveedor::create($request->all());

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor creado exitosamente.');
    }

    public function show(Proveedor $proveedor)
    {
        return view('proveedores.show', compact('proveedor'));
    }

    public function edit(Proveedor $proveedor)
    {
        return view('proveedores.edit', compact('proveedor'));
    }

    public function update(Request $request, Proveedor $proveedor)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'contacto' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'email' => 'required|email',
            'producto' => 'required|string|max:255',
            'direccion' => 'nullable|string'
        ]);

        $proveedor->update($request->all());

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor actualizado exitosamente.');
    }

    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor eliminado exitosamente.');
    }
}