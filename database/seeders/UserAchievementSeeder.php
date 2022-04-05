<?php

namespace Database\Seeders;

use App\Events\LessonWatched;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserAchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lesson = Lesson::first();
        $user = User::first();
        event(new LessonWatched($lesson, $user));
    }
}
