<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    protected $fillable = [
        'email', 'developer_id'
    ];
    
    /**
     * Get the developer that owns the subscriber
     */
    public function developer () {
        return $this->belongsTo(Developer::class);
    }
}
