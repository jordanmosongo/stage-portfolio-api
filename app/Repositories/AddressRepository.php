<?php

namespace App\Repositories;

use App\Interfaces\AddressInterface;
use App\Models\Address;

class AddressRepository implements AddressInterface {
    /**
     * @var $address
     */
    protected $address;

    public function __construct(Address $address) {
        $this->address = $address;
    }

    /**
     * show a specified address
     */

    public function findById($id) {
        return $this->address->find($id);
    }

    /**
     * save a new address
     */

    public function save($address) {
        return $this->address->create($address);
    }

    /**
     * update an existing address
     */

    public function update($address, $id) {
        return $this->$address->where(['id' => $id])->update($address);
    }
}