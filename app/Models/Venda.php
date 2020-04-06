<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Venda extends Model
{
    protected $table = "venda";
    public $timestamps = false;

    protected $fillable = [
        "idfuncionario",
        "id_cliente",
        "codigo_produto",
        "data"
    ];

    protected $casts = [
      'data' => 'Timestamps'
    ];

}
