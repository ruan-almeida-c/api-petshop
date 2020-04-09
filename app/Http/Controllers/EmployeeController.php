<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

 class EmployeeController extends Controller
{
    private $model;

    public function __construct(Employee $employee)
    {
        $this->model = $employee;
    }

    public function showAll()
    {
        $employee = $this->model->all();


        if (count($employee) == 0)
            return response()->json(['message' => 'employee list is empty'], Response::HTTP_BAD_REQUEST);
        return response()->json($employee);
    }

    public function index($id){
        $employee = $this->model->find($id);

        if($employee == null)
            return response()->json(['message' => 'failed to add new employee'], 404);
        return response()->json($employee,Response::HTTP_OK);
    }

    public function insert(Request $request){

        $this->validate($request, [
            'email' => 'required',
            'pass' => 'required'
        ], [
            'required' => 'the field :attribute is required!'
        ]);
        $employee = new $this->employee;
        $employee->id = $request->input('id');
        $employee->nome = $request->input('name');
        $employee->email = $request->input('email');
        $employee->pass = $request->input('pass');
        $employee->salary = $request->input('salary');
        $employee->cpf = $request->input('cpf');
        $employee->save();

        return response()->json($employee);

    }

    public function update($id, Request $request){
        $employee = $this->models->find($id)
            ->update($request->all());

        return response()->json($employee,Response::HTTP_OK);

    }

    public function destroy($id){
        $employee = $this->model->find($id)
            ->delete();

        return response()->json(null, Response::HTTP_OK);
    }
}
