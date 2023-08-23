<?php

namespace Xpeedstudio\Hr\Controllers;

use Illuminate\Http\Request;
use Xpeedstudio\Hr\Models\Job;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::all();

        return response()->json([
            'jobs' => $jobs,
        ]);

        return view('xpeedstudio/hr::job.index', compact('jobs'));
    }
    public function create()
    {
        $jobs = Job::all();

        return view('xpeedstudio/hr::job.create', compact('jobs'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'job_title' => 'required',
            'min_salary' => 'required',
            'max_salary' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422); // HTTP status code for Unprocessable Entity
        }

        // If validation passes, create the employee
        $data = Job::create($request->all());

        return response()->json([
            'message' => 'Job created successfully.',
            'data' => [$data]
        ], 201); // HTTP status code for Created
    }

    public function show($id)
    {
        $job = Job::find($id);
        return response()->json([
            'message' => 'Job created successfully.',
            'data' => [
                'job' => $job
            ]
        ], 201); // HTTP status code for Created

        return view('xpeedstudio/hr::job.show', compact('job'));
    }
}
