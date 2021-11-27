<?php

namespace App\Interfaces;

interface ProjectInterface {
    public function getAll();
    public function findById($id);
    public function save($project);
    public function update($project, $id);
}