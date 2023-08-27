<?php

namespace Xpeedstudio\Hr\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Xpeedstudio\Hr\Models\Department;
use Xpeedstudio\Hr\Models\Employee;
use Xpeedstudio\Hr\Models\Location;
use Illuminate\Support\Facades\Validator;
use Xpeedstudio\Hr\Models\Country;

class LocationController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10); // Number of results per page (default: 10)
        $search = $request->input('search', ''); // Search query (default: empty string)

        $locations = Location::with('country')
            ->when($request->filled('search'), function ($query) use ($search) {
                return $query->where(function ($query) use ($search) {
                    $query->where('street_address', 'like', '%' . $search . '%')
                        ->orWhere('postal_code', 'like', '%' . $search . '%')
                        ->orWhere('city', 'like', '%' . $search . '%')
                        ->orWhere('state_province', 'like', '%' . $search . '%');
                });
            })
            ->paginate($perPage);

        return response()->json([
            'locations' => $locations,
        ]);

        return view('xpeedstudio/hr::location.index', compact('locations'));
    }
    public function create()
    {
        $counties = Country::all();

        return view('xpeedstudio/hr::country.create', compact('counties'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'street_address'    => 'required',
            'postal_code'       => 'required',
            'city'              => 'required',
            'state_province'    => 'required',
            'country_id'        => 'required|exists:contries,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422); // HTTP status code for Unprocessable Entity
        }

        // If validation passes, create the employee
        $data = Location::create($request->all());

        return response()->json([
            'message' => 'Location created successfully.',
            'data' => [$data]
        ], 201); // HTTP status code for Created
    }

    public function show($id)
    {
        $location = Location::find($id);
        return response()->json([
            'message' => 'location fetch successfully.',
            'data' => [
                'location' => $location
            ]
        ], 201); // HTTP status code for Created

        return view('xpeedstudio/hr::location.show', compact('location'));
    }
}
