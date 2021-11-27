<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use App\Models\Project;
use App\Models\Developer;
use App\Services\ProjectService;

class ProjectController extends Controller
{
    /**
     * @var projectService
     */
    protected $projectService;

    /**
     * Create a new instance of projectService
     */
    public function __construct(ProjectService $projectService) {
        $this->projectService = $projectService;
    }

    /**
     * Display a list of projects.
    */

    public function index()
    {
        return $this->projectService->getAll();
    }

    /**
     * Get a specified project
     */

    public function show($id) {
        return $this->projectService->findById($id);
    }

    /**
     * create a new project and store it in storage
    */

    public function store(Request $request)
    {
        //  return $this->projectService->save($request->project);
        $project = new Project();
        $project->title = $request->project['title'];
        $project->description = $request->project['description'];
        $project->image = $request->project['image'];
        $project->url = $request->project['url'];  
        $project->istop = $request->project['istop'];
        $project->developer_id = $request->project['developer_id'];    
                
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
        return $this->projectService->update($request->project, $id);               
    }

}
