<?php
namespace App\Services;

use Illuminate\Http\Response;

use App\Repositories\SubscriberRepository;
use App\Interfaces\SubscriberInterface;

class SubscriberService implements SubscriberInterface {
    /**
     * @var subscriberRepository
     */
    protected $subscriberRepository;

    /**
     * create a new instance of SubscriberRepository
    */

    public function __construct(SubscriberRepository $subscriberRepository) {
        $this->subscriberRepository = $subscriberRepository;
    }

    /**
     * get all subscribers
     */
    public function getAll() {
        try {
            $subscribers = $this->subscriberRepository->getAll();
            return response()->json([
                'message' => 'success !',
                'data' => $subscribers
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'failed !',
                'error' => $th
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * save a new subscriber
     */
    public function save($subscriber) {
        try {
            $subscriber = $this->subsciberRepository->save($subscriber);
            return response()->json([
                'message' => 'success !',
                'data' => $subscriber
            ], Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'failed !',
                'error' => $th
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}