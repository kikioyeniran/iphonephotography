<?php

namespace App\Listeners;

use App\Events\AchievementUnlocked;
use App\Events\CommentWritten;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StoreCommentWritten
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
     * @param  \App\Events\CommentWritten  $event
     * @return void
     */
    public function handle(CommentWritten $event)
    {
        $comment = $event->comment;
        $user = User::find($event->comment->user->id);

        $user_comment_count = count($user->comments);


        switch ($user_comment_count) {
            case 1:
                # code...
                $achievement_string = 'First Comment Written';
                event(new AchievementUnlocked($achievement_string, $user));
                break;

            case 3:
                # code...
                $achievement_string = '3 Comments Written';
                event(new AchievementUnlocked($achievement_string, $user));
                break;

            case 5:
                # code...
                $achievement_string = '5 Comments Written';
                event(new AchievementUnlocked($achievement_string, $user));
                break;

            case 10:
                # code...
                $achievement_string = '10 Comment Written';
                event(new AchievementUnlocked($achievement_string, $user));
                break;

            case 20:
                # code...
                $achievement_string = '20 Comment Written';
                event(new AchievementUnlocked($achievement_string, $user));
                break;

            default:
                # code...
                break;
        }
    }
}
