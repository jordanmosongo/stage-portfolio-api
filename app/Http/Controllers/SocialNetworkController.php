<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\SocialNetwork;
use App\Models\Developer;

class SocialNetworkController extends Controller
{
   /**
     * Display a listing of the social networks.
    */

    public function index()
    {
        try {
            $socialNetworks = SocialNetwork::all();
            return response()->json([
                'message' => 'success !',
                'data' => $socialNetworks
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th,
            ], Response::HTTP_NOT_FOUND);
        }
    }
    /**
     * create a new social network and store it in storage
    */

    public function store(Request $request)
    {
        $socialNetwork = new SocialNetwork();
        $socialNetwork->title = $request->socialNetwork['title'];
        $socialNetwork->image = $request->socialNetwork['image'];
        $socialNetwork->url = $request->socialNetwork['url'];
        
        try {
            $existingDeveloper = Developer::find(1);
            
            $socialNetwork->developer()->associate($existingDeveloper);
            $socialNetwork->save();

            return response()->json([
                'message' => 'socialNetwork created successfully !',
                'data' => $socialNetwork
            ], Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }    

    }

    /**
     * Update the specified social network in storage.
    */

    public function update(Request $request, $id)
    {
        try {
            $socialNetwork = SocialNetwork::Where(["id" => $id])->update([
                'title' => $request->socialNetwork['title'],
                'image' => $request->socialNetwork['image'],
                'url' => $request->socialNetwork['url'],
            ]);
           
            return response()->json([
                'message' => 'socialNetwork updated successfully !',
                'data' => $socialNetwork
            ], Response::HTTP_OK);
            
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th,
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }        
    }
}
