<?php
namespace App\Services;
use Illuminate\Http\Response;
use App\Repositories\VisitorRepository;

class VisitorService {
    /**
     * @var $visitorRepository
     */
    protected $visitorRepository;

    /**
     * create an instance of VisitorRepository
     */
    public function __construct(VisitorRepository $visitorRepository) {
        $this->visitorRepository = $visitorRepository;
    }

    /**
     * get all visitors
     */

    public function getAll() {
        try {
            $visitors = $this->visitorRepository->getAll();
            return response()->json([
                'message' => 'success !',
                'data' => $visitors
            ], Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => 'failed !',
                'data' => $th
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Get a specified visitor
     * @param $id
     */   

    public function findById($id) {
        try {
            $visitor = $this->visitorRepository->findById($id);
            return response()->json([
                'message' => 'success !',
                'data' => $visitor
            ], Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => 'failed !',
                'data' => $th
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

      /**
     * delete an existing visitor
     */

    public function delete($id) {
        try {
            $this->visitorRepository->delete($id);
            return response()->json([
                'message' => 'deletion done successfully !'
                ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => 'failed !',
                'data' => $th
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}