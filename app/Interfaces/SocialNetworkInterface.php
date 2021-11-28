<?php
namespace App\Interfaces;

interface SocialNetworkInterface {
    public function getAll();
    public function findById($id);
    public function save($socialNetwork, $developer_id);
    public function update($socialNetwork, $id);
    public function delete($id);
}