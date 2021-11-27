<?php

namespace App\Repositories;

use App\Interfaces\VisitorInterface;
use App\Models\Visitor;

class VisitorRepository implements VisitorInterface {

    /**
     * @var visitor
     */
    protected $visitor;

    /**
     * create a new visitor instance
     * @param Visitor $visitor
     */

    public function __construct(Visitor $visitor) {
        $this->visitor = $visitor;
    }

    /**
     * Get all visitors
     */

    public function getAll() {
        return $this->visitor->with(['messages'])->get();
    }

    /**
     * Get a specific visitor by id
     */
    
    public function findById($id) {
        return $this->visitor->find($id);
    }

    /**
     * delete an existing visitor by his id
     */

    public function delete($id) {
        return $this->visitor->where(['id' => $id])->delete();
    }
    
}