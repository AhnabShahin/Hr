<?php

namespace Xpeedstudio\Hr\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Xpeedstudio\Hr\Models\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('xpeedstudio/hr::department-index', compact('departments'));
    }
    public function create()
    {
        return view('xpeedstudio/hr::department-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:departments',
        ]);

        Department::create($request->all());

        return redirect()
            ->back()
            ->with('success', 'Department created successfully.');
    }

    public function show($id)
    {
        $department = Department::findOrFail($id);
        return view('xpeedstudio/hr::department-show', compact('department'));
    }
}
