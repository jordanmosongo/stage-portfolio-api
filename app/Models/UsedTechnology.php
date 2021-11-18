<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsedTechnology extends Model
{
    use HasFactory;
    /**
     * Get the project made with the technology
     */
    public function project () {
        return $this->belongsTo(Project::class);
    }
    /**
     * Get the technology used in the project
     */
    public function technology () {
        return $this->belongsTo(Technology::class);
    }
}
