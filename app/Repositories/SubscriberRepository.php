<?php
namespace App\Repositories;

use App\Models\Subscriber;
use App\Interfaces\SubscriberInterface;

class SubscriberRepository implements SubscriberInterface {
    /**
     * @var subscriber
     */
    protected $subscriber;

    /**
    * create a new instance of Subscriber
    */

    public function __construct(Subscriber $subscriber) {
        $this->subscriber = $subscriber;
    }

    /**
     * Get all subscribers
     */

    public function getAll() {
        return $this->subscriber->all();
    }

    /**
     * create a new subscriber
     */

    public function save($subscriber) {
        return $this->subscriber->create($subscriber);
    }


}