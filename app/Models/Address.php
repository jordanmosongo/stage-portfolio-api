<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    
     /**
     * Get the developer that owns the address
     */
    
     public function developer () {
         return $this->belongsTo(Developer::class);
     }
}
