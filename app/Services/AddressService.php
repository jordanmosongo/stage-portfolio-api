<?php
namespace App\Services;
use Illuminate\Http\Response;
use App\Repositories\AddressRepository;
use App\Interfaces\AddressInterface;

class AddressService implements AddressInterface {
    /**
     * @var $addressRepository
     */
    protected $addressRepository;

    /**
     * create an instance of AddressRepository
     */
    public function __construct(AddressRepository $addressRepository) {
        $this->addressRepository = $addressRepository;
    }

    /**
     * Get a specified address
     * @param $id
     */

    public function findById($id) {
        try {
            $address = $this->addressRepository->findById($id);
            return response()->json([
                'message' => 'success !',
                'data' => $address
            ], Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => 'failed !',
                'data' => $th
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * save a new address
     */
    public function save($address) {
        try {
            $address = $this->addressRepository->save($address);
            return response()->json([
                'message' => 'address successfully saved !',
                'data' => $address
            ], Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => 'failed !',
                'data' => $th
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * update an existing address
     */

    public function update($address, $id) {
        try {
            $address = $this->addressRepository->update($address, $id);
            return response()->json([
                'message' => 'address updated successfully !',
                'data' => $address
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => 'failed !',
                'data' => $th
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}