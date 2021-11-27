<?php
namespace App\Interfaces;

interface AddressInterface {
    public function findById($id);
    public function save($address);
    public function update($address, $id);
}