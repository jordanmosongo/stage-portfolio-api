<?php
namespace App\Services;
use Illuminate\Http\Response;
use App\Repositories\SocialNetworkRepository;
use App\Interfaces\SocialNetworkInterface;

class SocialNetworkService implements SocialNetworkInterface {
    /**
     * @var $socialNetworkRepository
     */
    protected $socialNetworkRepository;

    /**
     * create an instance of socialNetworkRepository
     */
    public function __construct(SocialNetworkRepository $socialNetworkRepository) {
        $this->socialNetworkRepository = $socialNetworkRepository;
    }

    /**
     * get all socialNetworks
     */
    public function getAll() {
        return $this->socialNetworkRepository->getAll();
    }

    /**
     * Get a specified socialNetwork
     * @param $id
     */

    public function findById($id) {
        try {
            $socialNetwork = $this->socialNetworkRepository->findById($id);
            return response()->json([
                'message' => 'success !',
                'data' => $socialNetwork
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => 'failed !',
                'data' => $th
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * save a new socialNetwork
     */
    public function save($socialNetwork) {
        try {
            $socialNetwork = $this->socialNetworkRepository->save($socialNetwork);
            return response()->json([
                'message' => 'socialNetwork successfully saved !',
                'data' => $socialNetwork
            ], Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => 'failed !',
                'data' => $th
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * update an existing socialNetwork
     */

    public function update($socialNetwork, $id) {
        try {
            $socialNetwork = $this->socialNetworkRepository->update($socialNetwork, $id);
            return response()->json([
                'message' => 'socialNetwork updated successfully !',
                'data' => $socialNetwork
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => 'failed !',
                'data' => $th
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function delete($id) {
        try {
            return $this->socialNetworkRepository->delete($id);
            return response()->json([
                'message' => 'success !'
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => 'failed !',
                'data' => $th
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}