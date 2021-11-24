<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'image', 'url', 'istop'];

    /**
     * Get the developer that owns the project
     */
    public function developer () {
        return $this->belongsTo(Developer::class);
    }
    /**
     * Get technologies used in the project 
     */
    public function technologies () {
        return $this->belongsToMany(Technology::class);
       //return $this->hasMany(ProjectTechnology::class);
    }
   
}
