<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
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
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th,
            ], Response::HTTP_NOT_FOUND);
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
        //$project->technologies()->attach($request->project['technologiesIds']);
        
        try {
            $existingDeveloper = Developer::find(1);
            
            $project->developer()->associate($existingDeveloper);
            $project->save();

            return response()->json([
                'message' => 'project created successfully !',
                'data' => $project
            ], Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }    

    }

    /**
     * Update the specified project in storage.
    */

    public function update(Request $request, $id)
    {
        try {
            $updatedProject = Project::Where(["id" => $id])->update([
                'title' => $request->project['title'],
                'description' => $request->project['description'],
                'image' => $request->project['image'],
                'url' => $request->project['url'],
            ]);
           
            return response()->json([
                'message' => 'project updated successfully !',
                'data' => $updatedProject
            ], Response::HTTP_OK);
            
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th,
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }        
    }

}
