<?php

namespace App\Providers;

use App\Events\LessonWatched;
use App\Events\CommentWritten;
use Illuminate\Support\Facades\Event;
use App\Listeners\StoreCommentWritten;
use App\Listeners\StoreLessonWatched;
use App\Listeners\StoreAchievementUnlocked;
use App\Listeners\StoreBatchUnlocked;

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

        BatchUnlocked::class => [
            StoreBatchUnlocked::class
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
