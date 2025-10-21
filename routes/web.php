<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'inicio'])->name('inicio');
Route::get('/bienvenidos', [DashboardController::class, 'dashboard'])->name('dashboard');

// Rutas para Productos
Route::resource('productos', ProductoController::class);

// Rutas para Clientes
Route::resource('clientes', ClienteController::class);

// Rutas para Proveedores
Route::resource('proveedores', ProveedorController::class);

// Rutas para Ventas
Route::resource('ventas', VentaController::class);
Route::get('/ventas/get-precio/{id}', [VentaController::class, 'getProductoPrice'])->name('ventas.get-precio');