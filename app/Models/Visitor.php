<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;
    /**
     * Get messages sent by the visitor
     */
    public function messages () {
        return $this->hasMany(Message::class);
    }
}
