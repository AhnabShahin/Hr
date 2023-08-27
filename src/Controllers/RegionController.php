<?php

namespace Xpeedstudio\Hr\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Xpeedstudio\Hr\Models\Department;
use Xpeedstudio\Hr\Models\Employee;
use Xpeedstudio\Hr\Models\Location;
use Illuminate\Support\Facades\Validator;
use Xpeedstudio\Hr\Models\Region;

class RegionController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10); // Number of results per page (default: 10)
        $search = $request->input('search', ''); // Search query (default: empty string)

        $regions = Region::when($request->filled('search'), function ($query) use ($search) {
            return $query->where(function ($query) use ($search) {
                $query->where('region_name', 'like', '%' . $search . '%');
            });
        })->paginate($perPage);

        return response()->json([
            'regions' => $regions,
        ]);

        return view('xpeedstudio/hr::region.index', compact('regions'));
    }
    public function create()
    {
        return view('xpeedstudio/hr::region.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'region_name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422); // HTTP status code for Unprocessable Entity
        }

        // If validation passes, create the employee
        $data = Region::create($request->all());

        return response()->json([
            'message' => 'Region created successfully.',
            'data' => [$data]
        ], 201); // HTTP status code for Created
    }

    public function show($id)
    {
        $region = Region::find($id);
        return response()->json([
            'message' => 'Region created successfully.',
            'data' => [
                'region' => $region
            ]
        ], 201); // HTTP status code for Created

        return view('xpeedstudio/hr::region.show', compact('region'));
    }
}
