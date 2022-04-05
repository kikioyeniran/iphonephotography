<?php

namespace Database\Seeders;

use App\Models\Achievement;
use Illuminate\Database\Seeder;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $achivements = [
            ['title' => 'First Lesson Watched', 'criteria_count' => 1, 'achievement_type' => 'lesson'],
            ['title' => '5 Lessons Watched', 'criteria_count' => 5, 'achievement_type' => 'lesson'],
            ['title' => '10 Lessons Watched', 'criteria_count' => 10, 'achievement_type' => 'lesson'],
            ['title' => '25 Lessons Watched', 'criteria_count' => 25, 'achievement_type' => 'lesson'],
            ['title' => '50 Lessons Watched', 'criteria_count' => 50, 'achievement_type' => 'lesson'],
            ['title' => 'First Comment Written', 'criteria_count' => 1, 'achievement_type' => 'comment'],
            ['title' => '3 Comments Written', 'criteria_count' => 3, 'achievement_type' => 'comment'],
            ['title' => '5 Comments Written', 'criteria_count' => 5, 'achievement_type' => 'comment'],
            ['title' => '10 Comments Written', 'criteria_count' => 10, 'achievement_type' => 'comment'],
            ['title' => '20 Comments Written', 'criteria_count' => 20, 'achievement_type' => 'comment'],
        ];

        foreach ($achivements as $achivement) {
            Achievement::create($achivement);
        }
    }
}
