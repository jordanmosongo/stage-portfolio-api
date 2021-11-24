<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Visitor;
use App\Models\Message;
use App\Models\Developer;

class MessageController extends Controller
{
    /**
     * Display a list of messages
    */

    public function index()
    {
        try {
            $messages = Message::with(['visitor'])->get();
            return response()->json([
                'message' => 'success !',
                'data' => $messages
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th,
            ], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * store a message
    */

    public function store (Request $request, $developer_id) {
         
         DB::beginTransaction();
        
        try {
            
            $validator = Validator::make($request->all(), [
                'message.name' => 'required|max:30',
                'message.email' => 'required',
                'message.phone' => 'required',
                'message.objet' => 'required|max:50',
                'message.content' => 'required|max:255'
             ]);
             if ($validator->fails()) {
                 return response()->json([
                     'fail' => $validator->errors(),
                    ], Response::HTTP_UNPROCESSABLE_ENTITY);
             }

            // $newVisitor;
            // $existVisitor = Visitor::all()->where('email', '=', $request->message['email'])->first();
            // $newVisitorId = $existVisitor->id;            
            // if(!$existVisitor) {
            //     $newVisitor = Visitor::create([
            //         'name' => $request->message['name'],
            //         'email' => $request->message['email'],
            //         'phone' => $request->message['phone']
            //     ]);
            //     $newVisitorId = $newVisitor->id;
            // }

            $newVisitor = Visitor::create([
                'name' => $request->message['name'],
                'email' => $request->message['email'],
                'phone' => $request->message['phone']
            ]);
            $newVisitorId = $newVisitor->id;
                  
            $message = new Message();
            $message->objet = $request->message['objet'];
            $message->content = $request->message['content'];
            $message->developer_id = (int)$developer_id;
            $message->visitorId = $newVisitorId;
            $message->save();

            DB::commit();

            return response()->json([
                'message' => 'message sent successfully !',
                'data' => $newVisitor,
                'visitorId' => $newVisitorId,
                'developer_id' => (int)$developer_id
            ], Response::HTTP_CREATED);
            

        } catch (\Throwable $th) {

            DB::rollback();
            
            return response()->json([
                'message' => 'failed !',
                'error' => $th,
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
