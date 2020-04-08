<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use Illuminate\Http\Request;

 class ClienteController extends Controller
 {
     private $model;
    public function __construct(Cliente $cliente)
    {
        $this->model = $cliente;
    }
    public function getAll()
    {
        $cliente = $this->model->all();

        if (count($cliente) == 0)
            return response()->json(['message' => 'client list is empty'], 404);
        return response()->json($cliente, 200);
    }

    public function get($id){
        $cliente = $this->model->find($id);

        if($cliente == null)
            return response()->json(["message" => "Falha ao adicionar usuário"], 404);
        return response()->json($cliente,200);
    }

    public function insert(Request $request){
            $cliente = $this->model->create($request->all());
            return response()->json($cliente, 200);

    }

    public function update($id, Request $request){
        dd($id, $request ->all());
        $cliente = $this->models->find($id)
            ->update($request->all());

        return response()->json($cliente, 200);

    }

    public function destroy($id){
        $cliente = $this->model->find($id)
            ->delete();

        return response()->json(null, 200);
    }
}
