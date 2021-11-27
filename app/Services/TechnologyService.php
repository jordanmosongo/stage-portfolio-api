<?php
namespace App\Services;

use Illuminate\Http\Response;
use App\Repositories\TechnologyRepository;
use App\Interfaces\TechnologyInterface;


class TechnologyService implements TechnologyInterface {

    /**
     * @var technologyRepository
     */
    protected $technologyRepository;

    /**
     * create a new instance of TechnologyRepository in constructor
     * @param TechnologyRepository $technologyRepository
     */
    public function __construct(TechnologyRepository $technologyRepository) {
        $this->technologyRepository = $technologyRepository;
    }

    /**
     * Get all technologys
     */
    public function getAll() {
        try {
            $technologies = $this->technologyRepository->getAll();
            return response()->json([
                'message' => 'success !',
                'data' => $technologies
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'failed !',
                'error' => $th,
            ], Response::HTTP_INTERNAL_SERVER_ERROR);;
        }   
    }

    /**
     * get a specific technology by id
     * @param $id
     */

    public function findById($id) {
        try {
            $technology = $this->technologyRepository->findById($id);
            return response()->json([
                'message' => 'success !',
                'data' => $technology
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'failed !',
                'error' => $th,
            ], Response::HTTP_INTERNAL_SERVER_ERROR);;
        }
    }

    /**
     * Save a new technology
     * @param $technology
     */

    public function save($technology, $developer_id) {
        try {
            $technology = $this->technologyRepository->save($technology, $developer_id);
            return response()->json([
                'message' => 'success !',
                'data' => $technology
            ], Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'failed !',
                'error' => $th,
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Update an existing technology
     * @param $technology and his $id
     */

    public function update($technology, $id) {
        try {
            $technology = $this->technologyRepository->update($technology, $id);
            return response()->json([
                'message' => 'success !',
                'data' => $technology
            ], Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'failed !',
                'error' => $th,
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * delete a specified technology
     * @param $id
     */

    public function delete($id) {
        try {
            $this->technologyRepository->delete($id);
            return response()->json([
                'message' => 'deleted successfully !'
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'failed !',
                'error' => $th,
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    
}