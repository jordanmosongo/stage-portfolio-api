<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Technology;
use App\Models\Developer;
use App\Services\TechnologyService;

class TechnologyController extends Controller
{
    /**
     * @var technologyService
     */
    protected $technologyService;

    /**
     * create a new instance of TechnologyService
     */

    public function __construct(TechnologyService $technologyService) {
        $this->technologyService = $technologyService;
    }

    /**
     * Display a list of technologies
    */
    public function index()
    {
        return $this->technologyService->getAll();
    }

    /**
     * Display the specified technology.
    */
    public function show($id)
    {
        return $this->technologyService->findById($id);
    }

    /**
     * store a new technology
    */
    public function store(Request $request, $developer_id)
    {
        //  return $this->technologyService->save($request->technology, $developer_id);
        $technology = new Technology();
        $technology->title = $request->technology['title'];
        $technology->image = $request->technology['image'];
        
        try {
            $existingDeveloper = Developer::find($developer_id);
            
            $technology->developer()->associate($existingDeveloper);
            $technology->save();

            return response()->json([
                'message' => 'technology saved successfully !',
                'data' => $technology
            ], Response::HTTP_CREATED );
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }    

    }    

    /**
     * Update the specified technology in storage.
    */
    public function update(Request $request, $id)
    {
        return $this->technologyService->update($request->technology, $id);        
    }
    
    /**
     * Remove the specified technology from storage.
    */
    public function destroy($id)
    {
        return $this->technologyService->delete($id);         
    }
}
