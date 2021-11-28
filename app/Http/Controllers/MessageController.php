<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Visitor;
use App\Models\Message;
use App\Models\Developer;
use App\Services\MessageService;
use App\Helpers\Validators\MessageValidator;


class MessageController extends Controller
{
    /**
     * @var messageService
     */
    protected $messageService;

    /**
     * create a new instance of MessageService
     */
    public function __construct(MessageService $messageService) {
        $this->messageService = $messageService;
    }
    /**
     * Display a list of messages
    */

    public function index()
    {
        return $this->messageService->getAll();
    }

    /**
     * store a message
    */

    public function store (Request $request, $developer_id) {
        $validator = MessageValidator::validateMessage($request);
        if ($validator->fails()) {
            return response()->json([
                'fail' => $validator->errors(),
               ], Response::HTTP_UNPROCESSABLE_ENTITY);
        } 
        return $this->messageService->save($request->message, $developer_id);      
    }
}
