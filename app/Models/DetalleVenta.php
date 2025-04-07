<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;

    protected $fillable = [
        'venta_id', 
        'medicamento_id',
        'cantidad',
        'precio_unitario',
    ];

    public function medicamento()
    {
    return $this->belongsTo(Medicamento::class);
    }

    public function devoluciones()
    {
        return $this->hasMany(Devolucion::class, 'detalle_venta_id');
    }
}
