<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\SocialNetwork;
use App\Models\Developer;
use App\Services\SocialNetworkService;

class SocialNetworkController extends Controller
{
    /**
     * @var socialNetworkService
     */
    protected $socialNetworkService;

    /**
     * create a new instance of SocialNetworkSerice
     */
    public function __construct(SocialNetworkService $socialNetworkService) {
        $this->socialNetworkService = $socialNetworkService;
    }

   /**
     * Display a listing of the social networks.
    */

    public function index()
    {
        return $this->socialNetworkService->getAll();
    }

    /**
     * Display a specified social networks.
    */

    public function show($id)
    {
        return $this->socialNetworkService->findById($id);
    }
    /**
     * create a new social network and store it in storage
    */

    public function store(Request $request, $developer_id)
    {
        return $this->socialNetworkService->save($request->socialNetwork, $developer_id);      
    }

    /**
     * Update the specified social network in storage.
    */

    public function update(Request $request, $id)
    {
        return $this->socialNetworkService->update($request->socialNetwork, $id);           
    }

    /**
     * delete a specified social network
     */

    public function destroy($id) {
        return $this->socialNetworkService->delete($id);
    }
}
