<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;
    protected $table="producto";
    public $timestamps = false;
    protected $fillable = [
        "codigo_producto",
        "nombre",
        "gama",
        "dimensiones",
        "proveedor",
        "descripcion",
        "cantidad_en_stock",
        "precio_venta",
        "precio_proveedor"
    ];
    protected $primaryKey = 'codigo_producto';
    protected $keyType = 'string';
}
