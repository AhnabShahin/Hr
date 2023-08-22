<?php

namespace Xpeedstudio\Hr\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Xpeedstudio\Hr\Models\Department;
use Xpeedstudio\Hr\Models\Employee;
use Xpeedstudio\Hr\Models\Location;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{
    public function index()
    {
        $departments = Department::all();

        return response()->json([
            'departments' => $departments,
        ]);

        return view('xpeedstudio/hr::department.index', compact('departments'));
    }
    public function create()
    {
        $locations = Location::all();
        $managers = Employee::all();

        return view('xpeedstudio/hr::department.create', compact('locations', 'managers'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'department_name' => 'required',
            'location_id' => 'required|exists:locations,id',
            'manager_id' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422); // HTTP status code for Unprocessable Entity
        }

        // If validation passes, create the employee
        $data = Department::create($request->all());

        return response()->json([
            'message' => 'Department created successfully.',
            'data' => [$data]
        ], 201); // HTTP status code for Created
    }

    public function show($id)
    {
        $department = Department::find($id);
        return response()->json([
            'message' => 'Department created successfully.',
            'data' => [
                'department' => $department
            ]
        ], 201); // HTTP status code for Created

        return view('xpeedstudio/hr::department.show', compact('department'));
    }
}
