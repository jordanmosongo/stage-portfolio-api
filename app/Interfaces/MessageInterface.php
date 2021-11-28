<?php

namespace App\Interfaces;

interface MessageInterface {
    public function getAll();
    public function save($message, $developer_id, $visitorId);
}