<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Developer;
use App\Models\Address;

class AddressController extends Controller
{
    /**
     * show the specified address
     */
    public function show($id) {
        try {
            $address = Address::where(['id' => $id])->get();
            return response->json([
                'message' => 'success !',
                'data' => $address
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th
            ], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * create a new address and store it in storage
    */

    public function store(Request $request)
    {
        $address = new Address();
        $address->country = $request->address["country"];
        $address->town = $request->address["town"];
        $address->commune = $request->address["commune"];
        $address->quarter = $request->address["quarter"];
        $address->street = $request->address["street"];
        $address->number = $request->address["number"];
        $address->reference = $request->address["reference"];       
        
        try {
            $existingDeveloper = Developer::find(1);            
            $address->developer()->associate($existingDeveloper);
            $address->save();

            return response()->json([
                'message' => 'address created successfully !',
                'data' => $address
            ], Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }    

    }

    /**
     * Update the specified address in storage.
    */

    public function update(Request $request, $id)
    {
        try {
            $updatedAddress = Address::Where(["id" => $id])->update([
                'country' => $request->address['title'],
                'town' => $request->address['town'],
                'commune' => $request->address['commune'],
                'quarter' => $request->address['quarter'],
                'street' => $request->address['street'],
                'number' => $request->address['number'],
                'reference' => $request->address['reference'],
            ]);
           
            return response()->json([
                'message' => 'project updated successfully !',
                'data' => $updatedAddress
            ], Response::HTTP_OK);
            
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th,
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }        
    }
}
