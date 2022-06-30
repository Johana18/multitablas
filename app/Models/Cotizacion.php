<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    use HasFactory;
    protected $table = 'cotizacion';
    protected $primaryKey = 'cod_cotizacion';
    protected $fillable = ['atencion',
                        'precprod_ci',
                        'precprod_tot',
                        'cant_imp',
                        'utilidad_imp',
                        'precimp_ci',
                        'precimp_tot',
                        'vigencia_cot',
                        'cod_implemento',
                        'cod_cliente'
                    ];
    //Relacion de uno a muchos
    public function implemento()
    {
         return $this->belongsTo(Implemento::class,'cod_implemento','cod_implemento');
    }
    //Relacion de muchos a muchos
    public function productos()
    {
         return $this->belongsToMany(Producto::class,'cotizacion_producto','cod_cotizacion','cod_producto');
    }
}
