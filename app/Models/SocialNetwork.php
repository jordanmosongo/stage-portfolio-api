<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialNetwork extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'image', 'url', 'developer_id'];

    /**
     * Get the developer that owns the socialNetwork
     */
    public function developer () {
        return $this->belongsTo(Developer::class);
    }
}
