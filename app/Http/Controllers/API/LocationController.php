<?php

namespace App\Http\Controllers\API;

use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    function list() {
        $locations = Location::all();
        return response()->json([
            'status' => 'success',
            'message' => 'Locations have been retreived',
            'data'    => $locations,
        ], 200);
    }

    function add(Request $name) {
        Location::create([
            'name' => $name 
        ]);
    
        return response()->json([
            'status'    => 'success',
            'message'   => 'Location have been created',
        ], 200);
    }

    function edit($id, Request $data) {

        $validate = $data->validate([
            'name' => 'required|string',
        ]);
    
        $location = Location::whereId($id);
        if (!$location) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Location not found',
                ], 404);
            }
    
            $location->update($validate);
    
            return response()->json([
                'status' => 'success',
                'message' => 'Location updated successfully',
                'data' => $location,
            ], 200);
    }

    function delete($id) 
    {
        
    }
}
