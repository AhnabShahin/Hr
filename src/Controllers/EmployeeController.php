<?php

namespace Xpeedstudio\Hr\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Xpeedstudio\Hr\Models\Department;
use Xpeedstudio\Hr\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('xpeedstudio/hr::employee-index', compact('employees'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('xpeedstudio/hr::employee-create', compact('departments'));
    }

    public function store(Request $request)
    {
        // dd( $request);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'position' => 'required',
            'department_id' => 'required|exists:departments,id',
        ]);

        Employee::create($request->all());

        return redirect()->route('employees.index')
            ->with('success', 'Employee created successfully.');
    }

    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('xpeedstudio/hr::employee-show', compact('employee'));
    }
}
