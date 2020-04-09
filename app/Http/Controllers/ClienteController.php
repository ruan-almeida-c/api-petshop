<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

 class ClienteController extends Controller
 {
    private $model;
    public function __construct(Cliente $cliente)
    {
        $this->model = $cliente;
    }
    public function showAll()
    {
        $cliente = $this->model->all();

        if (count($cliente) == 0)
            return response()->json(['message' => 'client list is empty'], Response::HTTP_NOT_FOUND);
        return response()->json($cliente, 200);
    }

    public function index($id){
        $cliente = $this->model->find($id);

        if($cliente == null)
            return response()->json(["message" => "failed to add client"], Response::HTTP_NOT_FOUND);
        return response()->json($cliente,Response::HTTP_OK);
    }

    public function insert(Request $request){
            $cliente = $this->model->create($request->all());
            return response()->json($cliente, Response::HTTP_OK);
    }

    public function update($id, Request $request){
        dd($id, $request ->all());
        $cliente = $this->model->find($id)
            ->update($request->all());
        if ($cliente == null)
            return response()->json(['message' => 'sale not found'], 404);

        return response()->json($cliente, Response::HTTP_OK);
    }

    public function destroy($id){
        $cliente = $this->model->find($id)
            ->delete();

        return response()->json(null, Response::HTTP_OK);
    }
}
