<?php

namespace Database\Seeders;

use App\Models\Achievement;
use App\Models\Badge;
use App\Models\Comment;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $lessons = Lesson::factory()
            ->count(40)
            ->create();

        $users = User::factory()
            ->count(5)
            ->create();

        $this->call([
            AchievementSeeder::class,
            BadgeSeeder::class,
        ]);

        // $comments = Comment::factory()
        //     ->count(50)
        //     ->create();
    }
}
