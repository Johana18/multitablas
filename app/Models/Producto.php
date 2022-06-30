<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'producto';
    protected $primaryKey = 'cod_producto';
    protected $fillable = ['folio','marca','descripcion','costo'];

    //Relacion de muchos a muchos
    public function Cotizaciones()
    {
         return $this->belongsToMany(Cotizacion::class,'cotizacion_producto','cod_producto','cod_cotizacion');
    }
}
