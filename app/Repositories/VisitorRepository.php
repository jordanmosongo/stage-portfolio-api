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
     * Get a specific visitor by email
     */
    
    public function findByEmail($email) {
        return $this->visitor->where(['email' => $email])->get()->first();
    }

    /**
     * save a new visitor by id
     */
    
    public function save($data) {
        return $this->visitor->create([
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'phone' => $data['phone']
                        ]);
    }

    /**
     * delete an existing visitor by his id
     */

    public function delete($id) {
        return $this->visitor->where(['id' => $id])->delete();
    }
    
}