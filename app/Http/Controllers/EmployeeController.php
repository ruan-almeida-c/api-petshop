<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Validator;

 class EmployeeController extends Controller
{
    private $model;

    public function __construct(Employee $employee)
    {
        $this->model = $employee;
    }

    public function getAll()
    {
        $employee = $this->model->all();


        if (count($employee) == 0)
            return response()->json(['message' => 'employee list is empty'], 404);
        return response()->json($employee);
    }

    public function get($id){
        $employee = $this->model->find($id);

        if($employee == null)
            return response()->json(['message' => 'Falha ao adicionar usuário'], 404);
        return response()->json($employee,200);
    }

    public function insert(Request $request){

        $this->validate($request, [
            'email' => 'required',
            'pass' => 'required',
            'id' => 'required'
        ], [
            'required' => 'O campo :attribute é obrigatório!'
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

        return response()->json($employee, 200);

    }

    public function destroy($id){
        $employee = $this->model->find($id)
            ->delete();

        return response()->json(null, 200);
    }
}
