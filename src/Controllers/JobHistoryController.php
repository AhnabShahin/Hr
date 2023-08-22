<?php

namespace Xpeedstudio\Hr\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Xpeedstudio\Hr\Models\Department;
use Xpeedstudio\Hr\Models\Employee;
use Xpeedstudio\Hr\Models\Location;
use Illuminate\Support\Facades\Validator;
use Xpeedstudio\Hr\Models\Job;
use Xpeedstudio\Hr\Models\JobHistory;

class JobHistoryController extends Controller
{
    public function index()
    {
        $jobHistories = JobHistory::where(
             function ($query) {
                dd($query->job->toArray());
            }

        );

        return response()->json([
            'jobHistories' => $jobHistories,
        ]);

        return view('xpeedstudio/hr::job-histories.index', compact('jobHistories'));
    }
    public function create()
    {
        $departments = Department::all();
        $employees = Employee::all();
        $jobs = Job::all();

        return view('xpeedstudio/hr::job-histories.create', compact('employees', 'departments', 'jobs'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'start_date'    => 'required',
            'end_date'      => 'required',
            'employee_id'   => 'required|exists:employees,id',
            'job_id'        => 'required|exists:jobs,id',
            'department_id' => 'required|exists:departments,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422); // HTTP status code for Unprocessable Entity
        }

        // If validation passes, create the employee
        $data = JobHistory::create($request->all());

        return response()->json([
            'message' => 'Job history created successfully.',
            'data' => [$data]
        ], 201); // HTTP status code for Created
    }

    public function show($id)
    {
        $jobHistory = JobHistory::find($id);
        return response()->json([
            'message' => 'Job history created successfully.',
            'data' => [
                'jobHistory' => $jobHistory
            ]
        ], 201); // HTTP status code for Created

        return view('xpeedstudio/hr::job-histories.show', compact('jobHistory'));
    }
}
