<?php

namespace App\Providers;

use App\Events\LessonWatched;
use App\Events\CommentWritten;
use App\Events\AchievementUnlocked;
use App\Events\BadgeUnlocked;
use Illuminate\Support\Facades\Event;
use App\Listeners\StoreCommentWritten;
use App\Listeners\StoreLessonWatched;
use App\Listeners\StoreAchievementUnlocked;
use App\Listeners\StoreBadgeUnlocked;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        CommentWritten::class => [
            StoreCommentWritten::class
        ],

        LessonWatched::class => [
            StoreLessonWatched::class
        ],

        AchievementUnlocked::class => [
            StoreAchievementUnlocked::class
        ],

        BadgeUnlocked::class => [
            StoreBadgeUnlocked::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
