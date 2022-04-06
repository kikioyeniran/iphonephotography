<?php

namespace Tests\Feature;

use App\Events\AchievementUnlocked;
use App\Events\CommentWritten;
use App\Models\Achievement;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class AchievementUnlockedTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_achievement_unlocked()
    {
        Event::fake();

        $comment = Comment::factory()->create();

        $user = User::inRandomOrder()->first();

        $achievement = Achievement::inRandomOrder()->first();

        event(new AchievementUnlocked($achievement->title, $user));

        Event::assertDispatched(AchievementUnlocked::class);
    }
}
