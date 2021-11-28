<?php

namespace App\Repositories;

use App\Interfaces\TechnologyInterface;
use App\Models\Technology;

class TechnologyRepository implements TechnologyInterface {

    /**
     * @var technology
     */
    protected $technology;

    /**
     * create a new technology instance
     * @param Technology $technology
     */

    public function __construct(Technology $technology) {
        $this->technology = $technology;
    }

    /**
     * Get all technologys
     */

    public function getAll() {
        return $this->technology->all();
    }

    /**
     * Get a specific technology by id
     */
    
    public function findById($id) {
        return $this->technology->find($id);
    }

    /**
     * Create a new technology
     */

    public function save($technology, $developer_id) {
        return $this->technology->create([
            'title' => $technology->title,
            'image' => $technology->image,
            'developer_id' => $developer_id
        ]);
    }

    /**
     * update an existing technology by his id
     */

    public function update($technology, $id) {
        return $this->technology->where(['id' => $id])->update($technology);
    }

    /**
     * delete a technology 
     */

    public function delete($id) {
        return $this->technology->where(['id' => $id])->delete();
    }
    
}