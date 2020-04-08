<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $model;

    public function __construct(Product $produto)
    {
        $this->model = $produto;
    }
    public function getAll()
    {
        $produto = $this->model->all();

        if (count($produto) == 0)
            return response()->json(['message' => 'client list is empty'], 404);
        return response()->json($produto);
    }

    public function get($id){
        $produto = $this->model->find($id);

        if($produto == null)
            return response()->json(["message" => "Falha ao adicionar usuário"], 404);
        return response()->json($produto,200);
    }

    public function insert(Request $request){

        $produto = Product::create([
            "id" => $request["id"],
            "nome" => $request["nome"],
            "sobrenome" => $request["sobrenome"],
            "email" => $request["email"],
            "cpf" => $request["cpf"]
        ]);

        return response()->json($produto, 200);

    }

    public function update($id, Request $request){
        dd($id, $request ->all());
        $produto = $this->models->find($id)
            ->update($request->all());

        return response()->json($produto, 200);

    }

    public function destroy($id){
        $produto = $this->model->find($id)
            ->delete();

        return response()->json(null, 200);
    }
}
