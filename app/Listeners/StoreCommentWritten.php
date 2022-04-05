<?php

namespace App\Listeners;

use App\Events\AchievementUnlocked;
use App\Events\CommentWritten;
use App\Models\Achievement;
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

        // Check for possible achievement unlocked
        $possible_achievement = Achievement::where('achievement_type', 'comment')->where('criteria_count', $user_comment_count)->first();

        if (count($possible_achievement) > 0) {
            event(new AchievementUnlocked($possible_achievement->title, $user));
        }
    }
}
