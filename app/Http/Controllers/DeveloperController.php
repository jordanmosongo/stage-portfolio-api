<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Developer;

class DeveloperController extends Controller
{ 
    /**
     * Get all developers
     */
    public function index () {
        try {
            $developers = Developer::all();
            return response()->json([
                'message' => 'success !',
                'data' => $developers
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'failed !',
                'error' => $th,
            ], Response::HTTP_NOT_FOUND);
        }
    }
    
    /**
     * store a new developer
     */
    public function store(Request $request)
    {
        try {
            $developer = Developer::create([
                'name' => $request->developer['name'],
                'lastname' => $request->developer['lastname'],
                'firstname' => $request->developer['firstname'],
                'role' => $request->developer['role'],
                'description' => $request->developer['description'],
                'education' => $request->developer['education'],
                'training' => $request->developer['training'],
                'language' => $request->developer['language'],
                'lastword' => $request->developer['lastword'],
                'phone' => $request->developer['phone'],
                'email' => $request->developer['email'],
                'photo' => $request->developer['photo'],
                'aboutphoto' => $request->developer['aboutphoto'],
            ]);
            return response()->json([
                'message' => 'created successfully !',
                'data' => $developer
            ], Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'failed !',
                'error' => $th,
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
             
    }

    /**
     * show a specified developer
     */
    public function show($id)
    {
        try {
            $existDeveloper = Developer::with([
                'address',
                'technologies', 
                'socialNetworks', 
                'projects.technologies'
            ])->find($id);
            return response()->json([
                'message' => 'success !',
                'developer' => $existDeveloper
            ], Response::HTTP_CREATED);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'failed !',
                'error' => $th,
            ], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Update an existing developer
     */
    
    public function update(Request $request, $id)
    {
        try {
            $developerToUpdate = Developer::Where(["id" => $id])->update([
                'name' => $request->developer['name'],
                'lastname' => $request->developer['lastname'],
                'firstname' => $request->developer['firstname'],
                'role' => $request->developer['role'],
                'description' => $request->developer['description'],
                'education' => $request->developer['education'],
                'training' => $request->developer['training'],
                'language' => $request->developer['language'],
                'lastword' => $request->developer['lastword'],
                'phone' => $request->developer['phone'],
                'email' => $request->developer['email'],
                'photo' => $request->developer['photo'],
                'aboutphoto' => $request->developer['aboutphoto'],
            ]);           
            return response()->json([
                'message' => 'developer updated successfully !',
                'data' => $developerToUpdate
            ], Response::HTTP_OK);
            
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th,
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }        
    }

}
