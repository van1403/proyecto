<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'producto_id',
        'cantidad',
        'precio_unitario',
        'total',
        'fecha_venta'
    ];

    protected $casts = [
        'precio_unitario' => 'decimal:2',
        'total' => 'decimal:2',
        'fecha_venta' => 'date'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}