<?php

namespace App\Listeners;

use App\Events\AchievementUnlocked;
use App\Events\BadgeUnlocked;
use App\Models\Achievement;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
        $achievement = new Achievement();
        $achievement->title = $event->achievement_name;
        $achievement->user_id = $event->user->id;
        $achievement->save();

        $user_achievements = count($event->user->achievements);

        switch ($user_achievements) {
            case 1:
                # code...
                $badge_name = 'Beginner';
                event(new BadgeUnlocked($badge_name, $event->user));
                break;

            case 4:
                # code...
                $badge_name = 'Intermediate';
                event(new BadgeUnlocked($badge_name, $event->user));
                break;

            case 8:
                # code...
                $badge_name = 'Advanced';
                event(new BadgeUnlocked($badge_name, $event->user));
                break;

            case 10:
                # code...
                $badge_name = 'Master';
                event(new BadgeUnlocked($badge_name, $event->user));
                break;

            default:
                # code...
                break;
        }
    }
}
