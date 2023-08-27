<?php

namespace Xpeedstudio\Hr\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Xpeedstudio\Hr\Helpers\Helper;
use Xpeedstudio\Hr\Models\Country;
use Xpeedstudio\Hr\Models\Region;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10); // Number of results per page (default: 10)
        $search = $request->input('search', ''); // Search query (default: empty string)

        $countries = Country::with('region')
            ->when($search, function ($query, $search) {
                return $query->where('country_name', 'like', '%' . $search . '%');
            })
            ->paginate($perPage);

        return response()->json([
            'countries' => $countries,
        ]);

        return view('xpeedstudio/hr::country.index', compact('countries'));
    }
    public function create()
    {
        $regions = Region::all();

        return view('xpeedstudio/hr::country.create', compact('regions'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'country_name' => 'required',
            'region_id' => 'required|exists:regions,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422); // HTTP status code for Unprocessable Entity
        }

        // If validation passes, create the employee
        $data = Country::create($request->all());

        return response()->json([
            'message' => 'Country created successfully.',
            'data' => [$data]
        ], 201); // HTTP status code for Created
    }

    public function show($id)
    {
        $countries = Country::find($id);
        return response()->json([
            'message' => 'Country created successfully.',
            'data' => [
                'countries' => $countries
            ]
        ], 201); // HTTP status code for Created

        return view('xpeedstudio/hr::country.show', compact('countries'));
    }
}
