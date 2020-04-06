<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = "funcionario";
    protected $timestamps = false;

    protected $fillable = [
        "id",
        "nome",
        "email",
        "senha",
        "salario",
        "cpf"
    ];
}
