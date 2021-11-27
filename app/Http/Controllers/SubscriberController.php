<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Subscriber;
use App\Models\Developer;
use App\Services\SubscriberService;

class SubscriberController extends Controller
{
    /**
     * @var subscriberService
     */
    protected $subscriberService;

    /**
     * create a new instance of SubscriberService
     */
    public function __construct(SubscriberService $subscriberService) {
        $this->subscriberService = $subscriberService;
    }

    /**
    * Display a listing of subscribers' email
    */
    
    public function index()
    {
        return $this->subscriberService->getAll();
    }

    /**
    * Store a subscriber's email
    */

     public function store (Request $request, $developer_id) {
        $validator = Validator::make($request->all(), [
            'subscriber.email' => 'required|unique:subscribers,email'
         ]);
         if ($validator->fails()) {
             return response()->json([
                 'fail' => $validator->errors(),
             ], Response::HTTP_UNPROCESSABLE_ENTITY);
         } 
        try {           

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
