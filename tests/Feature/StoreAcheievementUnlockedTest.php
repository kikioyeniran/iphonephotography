<?php

namespace Tests\Feature;

use App\Events\AchievementUnlocked;
use App\Listeners\StoreAchievementUnlocked;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class StoreAcheievementUnlockedTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_achievement_unlocked_listener()
    {
        Event::fake();
        Event::assertListening(
            AchievementUnlocked::class,
            StoreAchievementUnlocked::class
        );
    }
}
