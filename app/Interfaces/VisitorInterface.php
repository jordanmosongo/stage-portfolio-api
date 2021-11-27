<?php
namespace App\Interfaces;

interface VisitorInterface {
    public function getAll();
    public function findById($id);
    public function delete($id);
    
}