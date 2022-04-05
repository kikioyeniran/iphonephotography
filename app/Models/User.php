<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Log;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The comments that belong to the user.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * The lessons that a user has access to.
     */
    public function lessons()
    {
        return $this->belongsToMany(Lesson::class);
    }

    /**
     * The lessons that a user has watched.
     */
    public function watched()
    {
        return $this->belongsToMany(Lesson::class)->wherePivot('watched', true);
    }

    /**
     * The achievements that belong to the user.
     */
    public function user_achievements()
    {
        return $this->belongsToMany(UserAchievement::class);
    }
    /**
     * The achievements that belong to the user.
     */
    public function achievements()
    {
        return $this->belongsToMany(Achievement::class, 'user_achievements');
    }

    /**
     * The badges that belong to the user.
     */
    public function user_badges()
    {
        return $this->hasMany(UserBadge::class);
    }

    /**
     * The badges that belong to the user.
     */
    public function badges()
    {
        return $this->belongsToMany(Badge::class, 'user_badges');
    }

    public function getCurrentBadgeAttribute()
    {
        $current_badge = Badge::first();
        if (count($this->badges) > 0) {
            $badge = UserBadge::where('user_id', $this->id)->orderBy('created_at', 'desc')->first();
            $current_badge = $badge->badge;
        }

        return $current_badge;
    }

    public function getNextBadgeAttribute()
    {
        $next = Badge::where('id', '>', $this->current_badge->id)->first();
        return $next;
    }

    public function getRemainingToUnlockNextBadgeAttribute()
    {
        $number_of_achievements = $this->achievements->count();
        $next_criteria_count = $this->next_badge->criteria_count;

        $remainder = $next_criteria_count - $number_of_achievements;
        $remainder = $remainder < 0 ? 0 : $remainder;

        return $remainder;
    }

    public function getNextAvailableAchievementAttribute()
    {
        $current_lesson_achievement = UserAchievement::where('user_id', $this->id)->whereHas('achievement', function ($q) {
            $q->where('achievement_type', 'lesson');
        })->orderBy('created_at', 'desc')->first();

        $current_comment_achievement = UserAchievement::where('user_id', $this->id)->whereHas('achievement', function ($q) {
            $q->where('achievement_type', 'comment');
        })->orderBy('created_at', 'desc')->first();

        Log::alert($current_lesson_achievement);

        if ($current_lesson_achievement != null) {
            $next_lesson_achievement = Achievement::where('id', '>', $current_lesson_achievement->achievement_id)->first();
        } else {
            $next_lesson_achievement = Achievement::where('achievement_type', 'lesson')->first();
        }

        if ($current_comment_achievement != null) {
            $next_comment_achievement = Achievement::where('id', '>', $current_comment_achievement->achievement_id)->first();
        } else {
            $next_comment_achievement = Achievement::where('achievement_type', 'comment')->first();
        }

        $next_available_achievement = [];
        $next_lesson_achievement_text = $next_lesson_achievement == null ? '' : $next_lesson_achievement->title;
        $next_comment_achievement_text = $next_comment_achievement == null ? '' : $next_comment_achievement->title;

        if ($next_lesson_achievement_text != '') {
            array_push($next_available_achievement, $next_lesson_achievement_text);
        }

        if ($next_comment_achievement_text != '') {
            array_push($next_available_achievement, $next_comment_achievement_text);
        }

        return $next_available_achievement;
    }
}
