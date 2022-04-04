<?php

namespace Database\Seeders;

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
            ->count(60)
            ->create();
        $users = User::factory()
            ->count(5)
            ->create();
        $comments = Comment::factory()
            ->count(50)
            ->create();
    }
}
