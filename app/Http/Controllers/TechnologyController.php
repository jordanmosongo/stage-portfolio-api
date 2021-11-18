<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Models\Technology;
use App\Models\Developer;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the technologies.
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
     * create a new technology and store it in storage
    */
    public function store(Request $request)
    {
        $technology = new Technology();
        $technology->title = $request->technology['title'];
        $technology->image = $request->technology['image'];
        
        DB::beginTransaction();
        try {
            $existingDeveloper = Developer::find(1);
            
            $technology->developer()->associate($existingDeveloper);
            $technology->save();

            DB::commit();
            return response()->json([
                'message' => 'technology saved successfully !',
                'data' => $technology
            ], 201);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'error' => $th
            ], );
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
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th,
            ], 404);
        }
    }

    /**
     * Update the specified technology in storage.
    */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $existingTechnology = Technology::find($id);
            $existingTechnology->title = $request->technology['title'];
            $existingTechnology->image = $request->technology['image'];

            $existingTechnology->save();
            DB::commit();
            return response()->json([
                'message' => 'technology updated successfully !',
                'data' => $existingTechnology
            ], 201);
            
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'error' => $th,
            ], 451);
        }        
    }
    
    /**
     * Remove the specified technology from storage.
    */
    public function destroy($id)
    {
        // Technology::Where(["id" => 1])->delete()

        // Technology::Where(["id" => 1])->update(["label" => "test"])

        DB::beginTransaction();
        try {
            $existingTechnology = Technology::find($id);
            $existingTechnology->delete();
            DB::commit();
            return response()->json([
                'message' => 'technology deleted successfully !',
            ], Response::HTTP_STATUS_OK);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'error' => $th,
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        
    }
}
