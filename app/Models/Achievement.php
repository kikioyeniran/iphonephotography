<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;
    protected $hidden = ['created_at', 'updated_at', 'criteria_count', 'achievement_type', 'pivot', 'id'];
    /**
     * Get the user that ownes the achievement.
     */
    public function user()
    {
        return $this->belongsToMany(User::class, 'user_achievements');
    }

    public function user_achievements()
    {
        return $this->belongsToMany(UserAchievement::class);
    }
}
