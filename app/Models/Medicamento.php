<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    //
    protected $fillable = [
        'nombre', 
        'stock', 
        'unidad_medida_id', 
        'precio', 
        'fecha_vencimiento'
    ];
}
