<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'user_id');
    }
    
    public function detalles()
    {
    return $this->hasMany(DetalleVenta::class);
    }
    protected $fillable = [
        'user_id', 
        'medicamento_id',
        'cantidad',
        'total',
        'fecha_venta'
    ];
}
