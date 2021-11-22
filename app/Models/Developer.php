<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;

    /**
     * mass assignable attributes
     */

    protected $fillable = [ 'name', 'lastname', 'firstname', 'role', 'description', 'education',
                            'training', 'language', 'lastword','phone', 'email', 'photo', 'aboutphoto' ];

    /**
     * Get the address associated to the developer
     */

    public function count () {
        return $this->hasOne(Count::class);
    }

    /**
     * Get the address associated to the developer
     */

    public function address () {
        return $this->hasOne(Address::class);
    }

    /**
     * Get socialNetworks associated to the developer
     */

    public function socialNetworks () {
        return $this->hasMany(SocialNetwork::class);
    }

    /**
     * Get subscribers associated to the developer
     */

    public function subscribers () {
        return $this->hasMany(Subscriber::class);
    }

    /**
     * Get technologies associated to the developer
     */

    public function technologies () {
        return $this->hasMany(Technology::class);
    }

    /**
     * Get projects associated to the developer
     */

    public function projects () {
        return $this->hasMany(Project::class);
    }

    /**
     * Get messages associated to the developer
     */
    
    public function messages () {
        return $this->hasMany(Message::class);
    }
}
