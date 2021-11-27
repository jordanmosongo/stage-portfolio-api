<?php

namespace App\Interfaces;

interface DeveloperInterface {
    public function getAll();
    public function findById($id);
    public function save($developer);
    public function update($developer, $id);
}
