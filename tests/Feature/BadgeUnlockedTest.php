<?php

namespace Tests\Feature;

use App\Events\BadgeUnlocked;
use App\Models\Badge;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class BadgeUnlockedTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_badge_unlocked()
    {
        Event::fake();

        $user = User::inRandomOrder()->first();

        $badge = Badge::inRandomOrder()->first();

        event(new BadgeUnlocked($badge->title, $user));

        Event::assertDispatched(BadgeUnlocked::class);
    }
}
