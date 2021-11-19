<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    /**
     * Get the develop that receives messages
     */
    public function developer () {
        return $this->belongsTo(Developer::class);
    }
    /**
     * Get the visitor that sends messages
     */
    public function visitor () {
        return $this->belongsTo(Visitor::class, 'visitorId');
    }
}
