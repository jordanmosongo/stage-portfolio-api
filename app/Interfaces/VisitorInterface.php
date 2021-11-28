<?php
namespace App\Interfaces;

interface VisitorInterface {
    public function getAll();
    public function findById($id);
    public function findByEmail($email);
    public function save($data);
    public function delete($id);
    
}