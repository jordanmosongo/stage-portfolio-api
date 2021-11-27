<?php

namespace App\Interfaces;

interface TechnologyInterface {
    public function getAll();
    public function findById($id);
    public function save($project, $developer_id);
    public function update($project, $id);
    public function delete($id);
}