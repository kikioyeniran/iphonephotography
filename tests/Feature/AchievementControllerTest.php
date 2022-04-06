<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AchievementControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_achievement_controller()
    {
        $user = User::inRandomOrder()->first();

        $response = $this->get("/users/{$user->id}/achievements");

        $response->assertStatus(200);
    }
}
