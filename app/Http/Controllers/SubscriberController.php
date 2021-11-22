<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Subscriber;
use App\Models\Developer;

class SubscriberController extends Controller
{
    /**
     * Display a listing of subscribers' email
    */
    public function index()
    {
        try {
            $subscribers = Subscriber::all();
            return response()->json([
                'message' => 'success !',
                'data' => $subscribers
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th,
            ], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Store a subscriber's email
     */

     public function store (Request $request, $developer_id) {
        try {

            $validator = Validator::make($request->all(), [
               'subscriber.email' => 'required|unique:subscribers,email'
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'fail' => $validator->errors(),
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
            }       

             $developer = Developer::find($developer_id);

             $subscriber = new Subscriber();
             $subscriber->email = $request->subscriber['email'];
             $subscriber->developer()->associate($developer);
             $subscriber->save();
         
             return response()->json([
                 'message' => 'success !',
                 'data' => $subscriber
             ], Response::HTTP_CREATED);
         } catch (\Throwable $th) {
            return response()->json([
                'error' => $th,
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
         }
     }
}
