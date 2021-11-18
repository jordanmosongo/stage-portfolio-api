<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Address::all();
    }
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

        $address->save();

        return $address;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $existingAddress = Address::find($id);
        if ($existingAddress) {
            $existingAddress->country = $request->address["country"];
            $existingAddress->town = $request->address["town"];
            $existingAddress->commune = $request->address["commune"];
            $existingAddress->quarter = $request->address["quarter"];
            $existingAddress->street = $request->address["street"];
            $existingAddress->number = $request->address["number"];
            $existingAddress->reference = $request->address["reference"];

            $address->save();
        }
        return "Sorry, no address found with this id";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existingAddress = Address::find($id);
        if ($existingAddress) {
            $existingAddress->delete();
            return "address successfully deleted !";
        }
        return "sorry, no address foud=nd with this id";
    }
}
