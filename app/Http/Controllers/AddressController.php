<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Developer;
use App\Models\Address;
use App\Services\AddressService;

class AddressController extends Controller
{
    /**
     * @var addressService
     */
    protected $addressService;

    /**
     * create an instance of addressService
     */

     public function __construct(AddressService $addressService) {
         $this->addressService = $addressService;
     }

    /**
     * show the specified address
     */

    public function show($id) {
        return $this->addressService->findById($id);
    }

    /**
     * create a new address and store it in storage
    */

    public function store(Request $request)
    {
        return $this->addressService->save($request->address);
    }

    /**
     * Update the specified address in storage.
    */

    public function update(Request $request, $id)
    {
        return $this->addressService->update($request->address, $id);
        // try {
        //     $updatedAddress = Address::Where(["id" => $id])->update([
        //         'country' => $request->address['title'],
        //         'town' => $request->address['town'],
        //         'commune' => $request->address['commune'],
        //         'quarter' => $request->address['quarter'],
        //         'street' => $request->address['street'],
        //         'number' => $request->address['number'],
        //         'reference' => $request->address['reference'],
        //     ]);
           
        //     return response()->json([
        //         'message' => 'project updated successfully !',
        //         'data' => $updatedAddress
        //     ], Response::HTTP_OK);
            
        // } catch (\Throwable $th) {
        //     return response()->json([
        //         'error' => $th,
        //     ], Response::HTTP_INTERNAL_SERVER_ERROR);
        // }        
    }
}
