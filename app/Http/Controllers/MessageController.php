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
     * store a message with all its dependances
     */

    public function store (Request $request) {

         
        DB::beginTransaction();
        
        try {

            $validator = Validator::make($request->all(), [
                'message.name' => 'required|max:30',
                'message.email' => 'required',
                'message.phone' => 'required',
                'message.object' => 'required|max:50',
                'message.content' => 'required|max:255'
             ]);
             if ($validator->fails()) {
                 return response()->json([
                     'fail' => $validator->errors(),
                 ], Response::HTTP_UNPROCESSABLE_ENTITY);
             }

            $newVisitor;
            $existVisitor = Visitor::where(['email' => $request->message['email']])->first();
            if(!$existVisitor) {
                $newVisitor = Visitor::create([
                    'name' => $validated->message['name'],
                    'email' => $validated->message['email'],
                    'phone' => $validated->message['phone']
                ]);
            }
                       
            $existingDeveloper = Developer::find(1);

            $message = new Message();
            $message->objet = $request->message['object'];
            $message->content = $request->message['content'];
            $message->developer()->associate($existingDeveloper);
            $message->visitor()->associate($existVisitor ? $existVisitor : $newVisitor);
            $message->save();

            DB::commit();

            return response()->json([
                'message' => 'message sent successfully !',
                'data' => $message
            ], Response::HTTP_CREATED);
            

        } catch (\Throwable $th) {

            //rollback transaction

            DB::rollback();
            
            return response()->json([
                'message' => 'failed !',
                'error' => $th,
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
