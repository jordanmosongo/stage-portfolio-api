<?php
namespace App\Interfaces;

interface SocialNetworkInterface {
    public function getAll();
    public function findById($id);
    public function save($address);
    public function update($address, $id);
    public function delete($id);
}