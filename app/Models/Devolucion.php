<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devolucion extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'detalle_venta_id',
        'cantidad_devuelta',
        'motivo',
        
    ];

    public function detalleVenta()
    {
        return $this->belongsTo(DetalleVenta::class, 'detalle_venta_id');
    }

}
