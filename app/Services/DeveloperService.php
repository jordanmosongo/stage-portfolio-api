<?php
namespace App\Services;

use Illuminate\Http\Response;
use App\Repositories\DeveloperRepository;
use App\Interfaces\DeveloperInterface;


class DeveloperService implements DeveloperInterface {

    /**
     * @var developerRepository
     */
    protected $developerRepository;

    /**
     * create a new instance of DeveloperRepository in constructor
     * @param DeveloperRepository $developerRepository
     */
    public function __construct(DeveloperRepository $developerRepository) {
        $this->developerRepository = $developerRepository;
    }

    /**
     * Get all developers
     */
    public function getAll() {
        try {
            $developers = $this->developerRepository->getAll();
            return response()->json([
                'message' => 'success !',
                'data' => $developers
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'failed !',
                'error' => $th,
            ], Response::HTTP_INTERNAL_SERVER_ERROR);;
        }   
    }

    /**
     * get a specific developer by id
     * @param $id
     */

    public function findById($id) {
        try {
            $developer = $this->developerRepository->findById($id);
            return response()->json([
                'message' => 'success !',
                'data' => $developer
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'failed !',
                'error' => $th,
            ], Response::HTTP_INTERNAL_SERVER_ERROR);;
        }
    }

    /**
     * Save a new developer
     * @param $developer
     */

    public function save($developer) {
        try {
            $developer = $this->developerRepository->save($developer);
            return response()->json([
                'message' => 'success !',
                'data' => $developer
            ], Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'failed !',
                'error' => $th,
            ], Response::HTTP_INTERNAL_SERVER_ERROR);;
        }
    }

    /**
     * Update an existing developer
     * @param $developer and his $id
     */

    public function update($developer, $id) {
        try {
            $developer = $this->developerRepository->update($developer, $id);
            return response()->json([
                'message' => 'success !',
                'data' => $developer
            ], Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'failed !',
                'error' => $th,
            ], Response::HTTP_INTERNAL_SERVER_ERROR);;
        }
    }
    
}