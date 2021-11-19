<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    /**
     * mass assignable attributes
     */

    protected $fillable = [
        'name',
        'email',
        'phone',
    ];

    /**
     * link messages to the visitor
     */
    public function messages () {
        return $this->hasMany(Message::class, 'visitorID');
    }
}
