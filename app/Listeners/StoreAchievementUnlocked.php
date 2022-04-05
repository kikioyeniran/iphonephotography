<?php

namespace App\Listeners;

use App\Events\AchievementUnlocked;
use App\Events\BadgeUnlocked;
use App\Models\Achievement;
use App\Models\Badge;
use App\Models\UserAchievement;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class StoreAchievementUnlocked
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\AchievementUnlocked  $event
     * @return void
     */
    public function handle(AchievementUnlocked $event)
    {
        Log::alert($event->achievement_name);
        Log::alert($event->user);

        $achievement = Achievement::where('title', $event->achievement_name)->first();
        $user_achievement = new UserAchievement();
        // $user_achievement->title = $event->achievement_name;
        $user_achievement->user_id = $event->user->id;
        $user_achievement->achievement_id = $achievement->id;
        $user_achievement->save();

        Log::alert($event->user->achievements);

        $user_achievement_count = count($event->user->achievements) ?? 0;

        Log::alert($user_achievement_count);

        $possible_badge = Badge::where('criteria_count', $user_achievement_count)->first();

        Log::alert($possible_badge);

        // if (count($possible_badge) > 0) {
        if ($possible_badge != null) {
            event(new BadgeUnlocked($possible_badge->title, $event->user));
        }

        // switch ($user_achievements) {
        //     case 1:
        //         # code...
        //         $badge_name = 'Beginner';
        //         event(new BadgeUnlocked($badge_name, $event->user));
        //         break;

        //     case 4:
        //         # code...
        //         $badge_name = 'Intermediate';
        //         event(new BadgeUnlocked($badge_name, $event->user));
        //         break;

        //     case 8:
        //         # code...
        //         $badge_name = 'Advanced';
        //         event(new BadgeUnlocked($badge_name, $event->user));
        //         break;

        //     case 10:
        //         # code...
        //         $badge_name = 'Master';
        //         event(new BadgeUnlocked($badge_name, $event->user));
        //         break;

        //     default:
        //         # code...
        //         break;
        // }
    }
}
