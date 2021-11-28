<?php
namespace App\Services;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Repositories\MessageRepository;
use App\Repositories\VisitorRepository;

class MessageService {
    /**
     * @var messageRepository
     * @var visitorRepository
     * @var newVisitorId;
     */
    protected $messageRepository;
    protected $visitorRepository;
    protected $newVisitorId;

    /**
     * create a new instance of MessageRepository
     * create a new instance of VisitorRepository
    */

    public function __construct(MessageRepository $messageRepository, VisitorRepository $visitorRepository) {
        $this->messageRepository = $messageRepository;
        $this->visitorRepository = $visitorRepository;
    }

    /**
     * get all messages
     */
    public function getAll() {
        try {
            $messages = $this->messageRepository->getAll();
            return response()->json([
                'message' => 'success !',
                'data' => $messages
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'failed !',
                'error' => $th
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * save a new message
     */
    public function save($message, $developer_id) {
        DB::beginTransaction();
        try {
            $existingVisitor = $this->visitorRepository->findByEmail($message['email']);

            if (!$existingVisitor) {
                $visitor = $this->visitorRepository->save($message);                
                $newVisitorId = $visitor->id;
            } else {
                $newVisitorId = $existingVisitor->id;
            }    

            $message = $this->messageRepository->save($message, $developer_id, $newVisitorId);

            DB::commit();

            return response()->json([
                'message' => 'success !',
                'data' => $message
            ], Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            DB::rollback();

            return response()->json([
                'message' => 'failed !',
                'error' => $th
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}