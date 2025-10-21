<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Cliente;
use App\Models\Producto;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::with(['cliente', 'producto'])->get();
        return view('ventas.index', compact('ventas'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $productos = Producto::all();
        return view('ventas.create', compact('clientes', 'productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0',
            'fecha_venta' => 'required|date'
        ]);

        $total = $request->cantidad * $request->precio_unitario;

        Venta::create([
            'cliente_id' => $request->cliente_id,
            'producto_id' => $request->producto_id,
            'cantidad' => $request->cantidad,
            'precio_unitario' => $request->precio_unitario,
            'total' => $total,
            'fecha_venta' => $request->fecha_venta
        ]);

        return redirect()->route('ventas.index')
            ->with('success', 'Venta registrada exitosamente.');
    }

    public function show(Venta $venta)
    {
        $venta->load(['cliente', 'producto']);
        return view('ventas.show', compact('venta'));
    }

    public function edit(Venta $venta)
    {
        $clientes = Cliente::all();
        $productos = Producto::all();
        return view('ventas.edit', compact('venta', 'clientes', 'productos'));
    }

    public function update(Request $request, Venta $venta)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0',
            'fecha_venta' => 'required|date'
        ]);

        $total = $request->cantidad * $request->precio_unitario;

        $venta->update([
            'cliente_id' => $request->cliente_id,
            'producto_id' => $request->producto_id,
            'cantidad' => $request->cantidad,
            'precio_unitario' => $request->precio_unitario,
            'total' => $total,
            'fecha_venta' => $request->fecha_venta
        ]);

        return redirect()->route('ventas.index')
            ->with('success', 'Venta actualizada exitosamente.');
    }

    public function destroy(Venta $venta)
    {
        $venta->delete();

        return redirect()->route('ventas.index')
            ->with('success', 'Venta eliminada exitosamente.');
    }

    public function getProductoPrice($id)
    {
        $producto = Producto::find($id);
        return response()->json(['precio' => $producto->precio]);
    }
}