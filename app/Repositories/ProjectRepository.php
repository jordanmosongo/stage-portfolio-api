<?php

namespace App\Repositories;

use App\Interfaces\ProjectInterface;
use App\Models\Project;

class ProjectRepository implements ProjectInterface {

    /**
     * @var project
     */
    protected $project;

    /**
     * create a new Project instance
     * @param Project $project
     */

    public function __construct(Project $project) {
        $this->project = $project;
    }

    /**
     * Get all Projects
     */

    public function getAll() {
        return $this->project->all();
    }

    /**
     * Get a specific Project by id
     */
    
    public function findById($id) {
        return $this->project->with(['technologies'])->find($id);
    }

    /**
     * Create a new Project
     */

    public function save($project) {
        $savedproject = $this->project->create([
            'title' => $project['title'],
            'description' => $project['description'],
            'image' => $project['image'],
            'url' => $project['url'],
            'istop' => $project['istop'],
            'developer_id' => $project['developer_id']
        ]);
        if($savedProject) {
            $savedproject = $this->project->all()->last();
            $savedproject->technologies()->sync($project['technologies_id']);
        }
        return $savedProject;
    }

    /**
     * update an existing Project by his id
     */

    public function update($project, $id) {
        return $this->project->where(['id' => $id])->update([
            'title' => $project['title'],
            'description' => $project['description'],
            'image' => $project['image'],
            'url' => $project['url'],
            'istop' => $project['istop']
        ]);
    }
    
}