<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Cliente;
use App\Models\Proveedor;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function inicio()
    {
        $stats = [
            'total_productos' => Producto::count(),
            'total_clientes' => Cliente::count(),
            'total_proveedores' => Proveedor::count(),
            'total_ventas' => Venta::count(),
            'ventas_hoy' => Venta::whereDate('created_at', today())->count()
        ];

        return view('inicio', compact('stats'));
    }

    public function dashboard()
    {
        $stats = [
            'total_productos' => Producto::count(),
            'total_clientes' => Cliente::count(),
            'total_proveedores' => Proveedor::count(),
            'total_ventas' => Venta::count(),
            'ventas_mes' => Venta::whereMonth('fecha_venta', now()->month)->count(),
            'valor_inventario' => Producto::sum(DB::raw('precio * stock'))
        ];

        $producto_max_stock = Producto::orderBy('stock', 'desc')->first();
        $producto_min_stock = Producto::orderBy('stock', 'asc')->first();

        $actividad_reciente = Venta::with(['cliente', 'producto'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('dashboard', compact('stats', 'producto_max_stock', 'producto_min_stock', 'actividad_reciente'));
    }
}
