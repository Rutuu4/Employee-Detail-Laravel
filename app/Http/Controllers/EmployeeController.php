<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function show()
    {
        $employees = Employee::orderBy('id', 'desc')->paginate(10);
        return view('dashboard', ['employees' => $employees]);
    }
    public function add(Request $request)
    {
        $employee = new Employee();
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->contact_no = $request->contact_no;
        $employee->save();
        return response()->json($employee);
    }
    public function update(Request $request)
    {

        $employee = Employee::find($request->id);
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->contact_no = $request->contact_no;
        $employee->save();
        return response()->json($employee);

    }
    public function show_id($id)
    {
        $employee = Employee::find($id);
        return response()->json($employee);
    }
    public function delete($id,Request $request)
    {
        $employee = Employee::find($request->id);
        $employee->delete();
        return response()->json($employee);
    }
}
