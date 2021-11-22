<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Technology;
use App\Models\Developer;

class TechnologyController extends Controller
{
    /**
     * Display a list of technologies
    */
    public function index()
    {
        try {
            $technologies = Technology::all();
            return response()->json([
                'message' => 'success !',
                'data' => $technologies
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th,
            ], 404);
        }
    }

    /**
     * store a new technology
    */
    public function store(Request $request, $developer_id)
    {
        $technology = new Technology();
        $technology->title = $request->technology['title'];
        $technology->image = $request->technology['image'];
        
        try {
            $existingDeveloper = Developer::find($developer_id);
            
            $technology->developer()->associate($existingDeveloper);
            $technology->save();

            return response()->json([
                'message' => 'technology saved successfully !',
                'data' => $technology
            ], Response::HTTP_CREATED );
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }    

    }

    /**
     * Display the specified technology.
    */
    public function show($id)
    {
        try {
            $existingTechnology = Technology::find($id);
            return response()->json([
                'message' => 'success !',
                'data' => $existingTechnology
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th,
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Update the specified technology in storage.
    */
    public function update(Request $request, $id)
    {
        try {
            $existingTechnology = Technology::find($id);
            $existingTechnology->title = $request->technology['title'];
            $existingTechnology->image = $request->technology['image'];

            $existingTechnology->save();
            return response()->json([
                'message' => 'technology updated successfully !',
                'data' => $existingTechnology
            ], Response::HTTP_OK);
            
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th,
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }        
    }
    
    /**
     * Remove the specified technology from storage.
    */
    public function destroy($id)
    {
        try {
            Technology::Where(["id" => $id])->delete();
            return response()->json([
                'message' => 'technology deleted successfully !',
            ], Response::HTTP_STATUS_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th,
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        
    }
}
