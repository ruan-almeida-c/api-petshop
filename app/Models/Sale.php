<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sale';
    public $timestamps = false;

    protected $fillable = [
        'idemployee',
        'id_cliente',
        'codigo_product',
        'data'
    ];

    protected $casts = [
      'data' => 'Timestamps'
    ];

}
