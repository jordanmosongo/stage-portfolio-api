<?php

namespace App\Repositories;

use App\Interfaces\DeveloperInterface;
use App\Models\Developer;

class DeveloperRepository implements DeveloperInterface {

    /**
     * @var developer
     */
    protected $developer;

    /**
     * create a new Developer instance
     * @param Developer $developer
     */

    public function __construct(Developer $developer) {
        $this->developer = $developer;
    }

    /**
     * Get all developers
     */

    public function getAll() {
        return $this->developer->all();
    }

    /**
     * Get a specific developer by id
     */
    
    public function findById($id) {
        return $this->developer->with([
            'address',
            'technologies', 
            'socialNetworks', 
            'projects.technologies'
            ])->find($id);
    }

    /**
     * Create a new developer
     */

    public function save($developer) {
        return $this->developer->create($developer);
    }

    /**
     * update an existing developer by his id
     */

    public function update($developer, $id) {
        return $this->developer->where(['id' => $id])->update($developer);
    }
    
}