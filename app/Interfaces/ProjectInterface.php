<?php

namespace App\Interfaces;

interface ProjectInterface {
    public function getAll();
    public function findById($id);
    public function save($project, $developer_id);
    public function update($project, $id);
}