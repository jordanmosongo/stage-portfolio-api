<?php

namespace App\Interfaces;

interface SubscriberInterface {
    public function getAll();
    public function save($subscriber, $developer_id);
}