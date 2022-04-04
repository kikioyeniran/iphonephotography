<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    use HasFactory;

    /**
     * Get the user that ownes the badge.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
