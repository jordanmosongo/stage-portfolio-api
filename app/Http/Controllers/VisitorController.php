<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Visitor;
use App\Services\VisitorService;

class VisitorController extends Controller
{
    /**
     * @var visitorService
     */
    protected $visitorService;

    /**
     * create a new instance of VisitorService
     */

    public function __construct(VisitorService $visitorService) {
        $this->visitorService = $visitorService;
    }

    /**
     * Display a listing of the visitors.
    */
    public function index()
    {
        return $this->visitorService->getAll();
    }

    /**
     * show a specified visitor
    */
    public function show($id)
    {
        return $this->visitorService->findById($id);
    }

    /**
     * delete a specified visitor
    */

    public function destroy($id)
    {
        return $this->visitorService->delete($id);
    }
}
