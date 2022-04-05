<?php

namespace App\Listeners;

use App\Events\AchievementUnlocked;
use App\Events\LessonWatched;
use App\Models\Achievement;
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

        $possible_achievement = Achievement::where('achievement_type', 'lesson')->where('criteria_count', $user_watch_count)->first();

        if (count($possible_achievement) > 0) {
            event(new AchievementUnlocked($possible_achievement->title, $user));
        }
    }
}
