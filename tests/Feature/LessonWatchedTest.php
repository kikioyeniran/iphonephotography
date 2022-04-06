<?php

namespace Tests\Feature;

use App\Events\LessonWatched;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class LessonWatchedTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_lesson_watched()
    {
        Event::fake();

        $user = User::inRandomOrder()->first();

        $lesson = Lesson::inRandomOrder()->first();

        event(new LessonWatched($lesson, $user));

        Event::assertDispatched(LessonWatched::class);
    }
}
