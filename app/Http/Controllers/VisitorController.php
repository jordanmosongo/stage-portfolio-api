<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Visitor;

class VisitorController extends Controller
{
    /**
     * Display a listing of the visitors.
    */
    public function index()
    {
        try {
            $visitors = Visitor::with(['messages'])->find();
            return response()->json([
                'message' => 'success !',
                'data' => $visitors
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th
            ], Response::HTTP_NOT_FOUND);
        }
    }
    public function show($id)
    {
        try {
            $visitor = Visitor::with(['messages'])->find($id);
            return response()->json([
                'message' => 'success !',
                'data' => $visitor
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th
            ], Response::HTTP_NOT_FOUND);
        }
    }

    public function destroy($id)
    {
        $existingVisitor = Visitor::find($id);
        if($existingVisitor) {
            $existingVisitor->delete();
            return "visitor successfully deleted !";
        }
        return "sorry, no visitor found with this id";
    }
}
