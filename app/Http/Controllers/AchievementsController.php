<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AchievementsController extends Controller
{
    public function index(User $user)
    {
        $unlocked_achievements = $user->achievements;
        $current_badge = $user->current_badge->title;
        $next_badge = $user->next_badge->title;
        $remaining_to_unlock_next_badge = $user->remaining_to_unlock_next_badge;
        $next_available_achievement = $user->next_available_achievement;
        return response()->json([
            'unlocked_achievements' => $unlocked_achievements,
            'next_available_achievements' => $next_available_achievement,
            'current_badge' => $current_badge,
            'next_badge' => $next_badge,
            'remaing_to_unlock_next_badge' => $remaining_to_unlock_next_badge
        ]);
    }
}
