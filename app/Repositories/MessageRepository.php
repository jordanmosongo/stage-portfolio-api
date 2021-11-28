<?php
namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\Message;
use App\Models\Visitor;
use App\Interfaces\MessageInterface;


class MessageRepository implements MessageInterface {
    /**
     * @var message
     * @var visitor
     */
    protected $message;
    protected $visitor;

    /**
    * create a new instance of message and visitor
    */

    public function __construct(Message $message, Visitor $visitor) {
        $this->message = $message;
        $this->visitor = $visitor;
    }

    /**
     * Get all messages
     */

    public function getAll() {
        return $this->message->all();
    }

    /**
     * create a new message
     */

    public function save($message, $developer_id, $visitorId) {
           return $this->message->create([
                'objet' => $message['objet'],
                'content' => $message['message'],
                'developer_id' => $developer_id,
                'visitorId' => $visitorId,
            ]);
    }


}