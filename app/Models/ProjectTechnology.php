<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTechnology extends Model
{
    use HasFactory;
    public function project () {
        return $this->belongsTo(Project::class);
    }
    public function technology () {
        return $this->belongsTo(Technology::class);
    }
}
