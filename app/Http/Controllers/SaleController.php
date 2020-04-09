<?php


namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Sale;

class SaleController extends Controller
{
    private $model;

    public function __construct(Sale $sale)
    {
        $this->model = $sale;
    }

    public function showAll()
    {
        $sale = $this->model->all();

        if (count($sale) == 0)
            return response()->json(['message' => 'the sales list is empty'],Response::HTTP_NOT_FOUND);

        return response()->json($sale);
    }

    public function index($id)
    {
        $sale = $this->model->find($id);
        if ($sale == null)
            return response()->json(['message' => 'sale not found'], Response::HTTP_NOT_FOUND);

        return response()->json($sale);
    }

    public function insert(Request $request)
    {
        $sale = Sale::create($request->all());

        return response()->json($sale);
    }

    public function update($id, Request $request)
    {
        $sale = $this->model->find($id)
            ->update($request->all());
        if ($sale == null)
            return response()->json(['message' => 'sale not found'], 404);

        return response()->json($sale);
    }

    public function destroy($id)
    {
        $sale = $this->model->find($id)
            ->delete();
        if ($sale == null)
            return response()->json(['message' => 'sale not found'], Response::HTTP_NOT_FOUND);

        return response()->json(null, Response::HTTP_OK);
    }

}
