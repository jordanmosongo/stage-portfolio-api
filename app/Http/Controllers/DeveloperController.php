<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Developer;

class DeveloperController extends Controller
{ 
    
    /**
     * Create a new developer and keep him in storage.
     */
    public function store(Request $request)
    {
        $developer = new Developer();
        $developer->name = $request->developer['name'];
        $developer->lastname = $request->developer['lastname'];
        $developer->firstname = $request->developer['firstname'];
        $developer->role = $request->developer['role'];
        $developer->description = $request->developer['description'];
        $developer->lastword = $request->developer['lastword'];
        $developer->phone = $request->developer['phone'];
        $developer->email = $request->developer['email'];
        $developer->photo = $request->developer['photo'];

        $developer->save();
        return $developer;            
    }

    /**
     * find an existing developer
     */
    public function show($id)
    {
        $existingDeveloper = Developer::with(['technologies'])->find($id);
        if ($existingDeveloper) {
            return $existingDeveloper;
        }
        return 'sorry, no found developer with this id';
    }
    /**
     * Update an existing developer
     */
    public function update(Request $request, $id)
    {
        $existingDeveloper = Developer::find($id);
        if ($existingDeveloper) {
            $existingDeveloper->name = $request->developer['name'];
            $existingDeveloper->lastname = $request->developer['lastname'];
            $existingDeveloper->firstname = $request->developer['firstname'];
            $existingDeveloper->role = $request->developer['role'];
            $existingDeveloper->description = $request->developer['description'];
            $existingDeveloper->lastword = $request->developer['lastword'];
            $existingDeveloper->phone = $request->developer['phone'];
            $existingDeveloper->email = $request->developer['email'];
            $existingDeveloper->photo = $request->developer['photo'];

            $existingDeveloper->save();
            return $existingDeveloper;   
        }
        return "sorry, no developer found with this id";
    }

}
