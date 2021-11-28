<?php
namespace App\Services;

use Illuminate\Http\Response;
use App\Repositories\ProjectRepository;
use App\Interfaces\ProjectInterface;


class ProjectService implements ProjectInterface {

    /**
     * @var projectRepository
     */
    protected $projectRepository;

    /**
     * create a new instance of ProjectRepository in constructor
     * @param ProjectRepository $projectRepository
     */
    public function __construct(ProjectRepository $projectRepository) {
        $this->projectRepository = $projectRepository;
    }

    /**
     * Get all Projects
     */
    public function getAll() {
        try {
            $projects = $this->projectRepository->getAll();
            return response()->json([
                'message' => 'success !',
                'data' => $projects
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'failed !',
                'error' => $th,
            ], Response::HTTP_INTERNAL_SERVER_ERROR);;
        }   
    }

    /**
     * get a specific project by id
     * @param $id
     */

    public function findById($id) {
        try {
            $project = $this->projectRepository->findById($id);
            return response()->json([
                'message' => 'success !',
                'data' => $project
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'failed !',
                'error' => $th,
            ], Response::HTTP_INTERNAL_SERVER_ERROR);;
        }
    }

    /**
     * Save a new Project
     * @param $Project
     */

    public function save($project, $developer_id) {
        try {
            $project = $this->projectRepository->save($project, $developer_id);
            return response()->json([
                'message' => 'success !',
                'data' => $project
            ], Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'failed !',
                'error' => $th,
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Update an existing Project
     * @param $Project and his $id
     */

    public function update($project, $id) {
        try {
            $project = $this->projectRepository->update($project, $id);
            return response()->json([
                'message' => 'success !',
                'data' => $project
            ], Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'failed !',
                'error' => $th,
            ], Response::HTTP_INTERNAL_SERVER_ERROR);;
        }
    }
    
}