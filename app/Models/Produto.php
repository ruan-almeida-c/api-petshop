<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = produto;
    protected $timestamps = false;

    protected $fillable = [
        "codigo",
        "nome",
        "categoria",
        "preco"
    ];
}
