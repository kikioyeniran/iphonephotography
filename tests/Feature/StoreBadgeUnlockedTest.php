<?php

namespace Tests\Feature;

use App\Events\BadgeUnlocked;
use App\Listeners\StoreBadgeUnlocked;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class StoreBadgeUnlockedTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_badge_unlocked_listener()
    {
        Event::fake();
        Event::assertListening(
            BadgeUnlocked::class,
            StoreBadgeUnlocked::class
        );
    }
}
