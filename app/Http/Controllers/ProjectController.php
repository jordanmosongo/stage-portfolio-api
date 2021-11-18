<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Project;
use App\Models\Developer;

class ProjectController extends Controller
{
    /**
     * Display a listing of the projects.
    */

    public function index()
    {
        try {
            $projects = Project::all();
            return response()->json([
                'message' => 'success !',
                'data' => $projects
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th,
            ], 404);
        }
    }

    /**
     * create a new project and store it in storage
    */

    public function store(Request $request)
    {
        $project = new Project();
        $project->title = $request->project['title'];
        $project->description = $request->project['description'];
        $project->image = $request->project['image'];
        $project->url = $request->project['url'];
        
        DB::beginTransaction();
        try {
            $existingDeveloper = Developer::find(1);
            
            $project->developer()->associate($existingDeveloper);
            $project->save();

            DB::commit();
            return response()->json([
                'message' => 'project saved successfully !',
                'data' => $project
            ], 201);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'error' => $th
            ], 451);
        }    

    }

}
