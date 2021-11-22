<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Count extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'password'];

    /**
     * Get the developer that owns the count
     */
    
    public function developer () {
        return $this->belongsTo(Developer::class);
    }
}
