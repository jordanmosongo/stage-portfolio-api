<?php

namespace App\Repositories;

use App\Interfaces\SocialNetworkInterface;
use App\Models\SocialNetwork;

class SocialNetworkRepository implements SocialNetworkInterface {
    /**
     * @var $socialNetwork
     */
    protected $socialNetwork;

    public function __construct(SocialNetwork $socialNetwork) {
        $this->socialNetwork = $socialNetwork;
    }

    /**
     * get all socialNetworks
     */

    public function getAll() {
        return $this->socialNetwork->all();
    }

    /**
     * show a specified socialNetwork
     */

    public function findById($id) {
        return $this->socialNetwork->find($id);
    }

    /**
     * save a new socialNetwork
     */

    public function save($socialNetwork, $developer_id) {
        return $this->socialNetwork->create([
            'title' => $socialNetwork['title'],
            'image' => $socialNetwork['image'],
            'url' => $socialNetwork['url'],
            'developer_id' => $developer_id
        ]);
    }

    /**
     * update an existing socialNetwork
     */

    public function update($socialNetwork, $id) {
        return $this->socialNetwork->where(["id" => $id])-> update([
            'title' => $socialNetwork['title'],
            'image' => $socialNetwork['image'],
            'url' => $socialNetwork['url']
        ]);
    }

    /**
     * delete a specified socialNetwork
    */
    public function delete($id) {
        return $this->socialNetwork->where(['id' => $id])->delete();
    }
}