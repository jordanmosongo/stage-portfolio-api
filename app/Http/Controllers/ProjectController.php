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
     * Display a list of projects.
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
     * Get a specified project
     */

    public function show($id) {
        try {
            $project = Project::find($id);
            return response()->json([
                'message' => 'success !',
                'project' => $project
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'failed !',
                'error' => $th,
            ], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * create a new project and store it in storage
    */

    public function store(Request $request, $developer_id)
    {
        $project = new Project();
        $project->title = $request->project['title'];
        $project->description = $request->project['description'];
        $project->image = $request->project['image'];
        $project->url = $request->project['url'];  
        $project->istop = $request->project['istop'];
        $project->developer_id = $developer_id;    
                
        try {
              
            $savedProject = $project->save();
            if($savedProject) {
                $project = Project::all()->last();
                $project->technologies()->sync($request->project['technologies_id']);
            }
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
                'istop' => $request->project['istop']
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
