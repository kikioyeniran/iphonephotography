<?php

namespace Tests\Feature;

use App\Events\LessonWatched;
use App\Listeners\StoreLessonWatched;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class StoreLessonWatchedTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_lesson_watched_listener()
    {
        Event::fake();
        Event::assertListening(
            LessonWatched::class,
            StoreLessonWatched::class
        );
    }
}
