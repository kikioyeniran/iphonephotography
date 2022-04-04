<?php

namespace App\Listeners;

use App\Events\AchievementUnlocked;
use App\Events\LessonWatched;
use App\Models\Lesson;
use App\Models\LessonUser;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class StoreLessonWatched
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
     * @param  \App\Events\LessonWatched  $event
     * @return void
     */
    public function handle(LessonWatched $event)
    {
        $lesson_watched = new LessonUser();
        $lesson_watched->user_id = $event->user->id;
        $lesson_watched->lesson_id = $event->lesson->id;
        $lesson_watched->watched = true;
        $lesson_watched->save();

        Log::alert($lesson_watched);

        $user = User::find($event->user->id);

        $user_watch_count = count($user->watched);


        switch ($user_watch_count) {
            case 1:
                # code...
                $achievement_string = 'First Lesson Watched';
                event(new AchievementUnlocked($achievement_string, $user));
                break;

            case 5:
                # code...
                $achievement_string = '5 Lessons Watched';
                event(new AchievementUnlocked($achievement_string, $user));
                break;

            case 10:
                # code...
                $achievement_string = '10 Lessons Watched';
                event(new AchievementUnlocked($achievement_string, $user));
                break;

            case 25:
                # code...
                $achievement_string = '25 Lessons Watched';
                event(new AchievementUnlocked($achievement_string, $user));
                break;

            case 50:
                # code...
                $achievement_string = '50 Lessons Watched';
                event(new AchievementUnlocked($achievement_string, $user));
                break;

            default:
                # code...
                break;
        }
    }
}
