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
    }
}
