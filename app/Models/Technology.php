<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    /**
     * Get the developer that owns the technology
     */
    public function developer () {
        return $this->belongsTo(Developer::class);
    }
    /**
     * Get made projects with the technology
     */
    public function projects () {
        //return $this->belongsToMany(Project::class);
        return $this->hasMany(ProjectTechnology::class);
    }
}
