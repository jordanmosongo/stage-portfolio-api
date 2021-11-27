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

    public function show ($id)
    {
        return $this->developerService->findById($id);
    }
    
    /**
     * store a new developer
     */
    public function store (Request $request)
    {
        return $this->developerService->save($request->developer);                  
    }    

    /**
     * Update an existing developer
     */
    
    public function update(Request $request, $id)
    {
        return $this->developerService->update($request->developer, $id);       
    }

}
