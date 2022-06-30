<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Implemento extends Model
{
    use HasFactory;


    protected $table = 'implemento';
    protected $primaryKey = 'cod_implemento';
    protected $fillable = ['marca','descripcion','costo'];
    
    public function cotizaciones()
    {
        return $this->hasMany(Cotizacion::class,'cod_implemento','cod_implemento');
    }
}
