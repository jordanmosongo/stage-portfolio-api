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

    public function store(Request $request, $developer_id)
    {
        return $this->projectService->save($request->project, $developer_id);       
    }

    /**
     * Update the specified project in storage.
    */

    public function update(Request $request, $id)
    {
        return $this->projectService->update($request->project, $id);               
    }

}
