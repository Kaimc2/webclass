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

    function add(Request $request) {
        $location = Location::create([
            'name' => $request->get('name')
        ]);
    
        return response()->json([
            'status'    => 'success',
            'message'   => 'Location have been created',
            'data'      => $location
        ], 200);
    }

    function edit($id, Request $request) {

        $request->validate([
            'name' => 'required|string',
        ]);
    
        $location = Location::whereId($id);
        if (!$location) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Location not found',
                ], 404);
            }
    
            $location->update([
                'name'  => $request->get('name')
            ]);
    
            return response()->json([
                'status' => 'success',
                'message' => 'Location updated successfully',
                'data' => $location,
            ], 200);
    }

    function delete($id) 
    {
        $location = Location::whereId($id)->first();
        if(!$location) {
            return response()->json([
                'status'    => 'error',
                'message'   => 'Location not found'
            ], 404);
        }else{
            $location->delete();
            return response()->json([
                'status'    => 'success',
                'message'   => 'Location has been deleted'
            ], 200);
        }
    }
}
