<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Visitor::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $visitor = new Visitor;
        $visitor->name = $request->visitor["name"];
        $visitor->email = $request->visitor["email"];
        $visitor->phone = $request->visitor["phone"];
        $visitor->save();

        return $visitor;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $existingVisitor = Visitor::find($id);
        if ($existingVisitor) {
            $existingVisitor->name = $request->visitor["name"];
            $existingVisitor->email = $request->visitor["email"];
            $existingVisitor->phone = $request->visitor["phone"];
            $existingVisitor->save();

            return $existingVisitor;
        }
        //return response()->json(["status" => 201],201);
        return "sorry, no user found with this id";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
