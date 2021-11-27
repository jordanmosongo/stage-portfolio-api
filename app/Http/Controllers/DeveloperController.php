<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Developer;
use App\Services\DeveloperService;

class DeveloperController extends Controller
{ 
    /**
     * @var developerService
     */

    protected $developerService;

    /**
     * inject DeveloperService dependance
     */

    public function __construct(DeveloperService $developerService) {
        $this->developerService = $developerService;
    }

    /**
     * Get all developers
     */
    public function index () {
        return $this->developerService->getAll();
    }

    /**
     * show a specified developer
     */

    public function show($id)
    {
        return $this->developerService->findById($id);
    }
    
    /**
     * store a new developer
     */
    public function store(Request $request)
    {
        return $this->developerService->save($request->developer);                  
    }    

    /**
     * Update an existing developer
     */
    
    public function update(Request $request, $id)
    {
        return $this->developerService->update($request->developer, $id);
        // try {
        //     $developerToUpdate = Developer::Where(["id" => $id])->update([
        //         'name' => $request->developer['name'],
        //         'lastname' => $request->developer['lastname'],
        //         'firstname' => $request->developer['firstname'],
        //         'role' => $request->developer['role'],
        //         'description' => $request->developer['description'],
        //         'education' => $request->developer['education'],
        //         'training' => $request->developer['training'],
        //         'language' => $request->developer['language'],
        //         'lastword' => $request->developer['lastword'],
        //         'phone' => $request->developer['phone'],
        //         'email' => $request->developer['email'],
        //         'photo' => $request->developer['photo'],
        //         'aboutphoto' => $request->developer['aboutphoto'],
        //     ]);           
        //     return response()->json([
        //         'message' => 'developer updated successfully !',
        //         'data' => $developerToUpdate
        //     ], Response::HTTP_OK);
            
        // } catch (\Throwable $th) {
        //     return response()->json([
        //         'error' => $th,
        //     ], Response::HTTP_INTERNAL_SERVER_ERROR);
        // }        
    }

}
