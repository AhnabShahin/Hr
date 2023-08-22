<?php

namespace Xpeedstudio\Hr\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Xpeedstudio\Hr\Models\Department;
use Xpeedstudio\Hr\Models\Employee;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('department','department.location','department.location.country','department.location.country.region')->get();

        return response()->json([
            'employees' => $employees,
        ]);

        return view('xpeedstudio/hr::employee.index', compact('employees'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('xpeedstudio/hr::employee.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name'        => 'required',
            'last_name'         => 'required',
            'email'             => 'required|email',
            'phone_number'      => 'required',
            'hire_date'         => 'required',
            'job_id'            => 'required|exists:jobs,id',
            'salary'            => 'required',
            'commission_pct'    => 'required',
            'manager_id'        => 'nullable',
            'department_id'     => 'required|exists:departments,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422); // HTTP status code for Unprocessable Entity
        }

        $data = Employee::create($request->all());

        return response()->json([
            'message' => 'Department created successfully.',
            'data' => [$data]
        ], 201); // HTTP status code for Created

        return redirect()->route('employees.index')
            ->with('success', 'Employee created successfully.');
    }

    public function show($id)
    {
        $employee = Employee::findOrFail($id);

        return response()->json([
            'message' => 'Department created successfully.',
            'data' => [
                'employee' => $employee,
                'department' => $employee->department
            ]
        ], 201); // HTTP status code for Created

        return view('xpeedstudio/hr::employee.show', compact('employee'));
    }
}
