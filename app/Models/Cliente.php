<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = 'cliente';
    protected $primaryKey = 'cod_cliente';
    protected $fillable = ['enc_emp','raz_soc','telefono','e_mail'];
}