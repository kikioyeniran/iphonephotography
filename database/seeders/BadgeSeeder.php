<?php

namespace Database\Seeders;

use App\Models\Badge;
use Illuminate\Database\Seeder;

class BadgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $badges = [
            ['title' => 'Beginner', 'criteria_count' => 0],
            ['title' => 'Intermediate', 'criteria_count' => 4],
            ['title' => 'Advanced', 'criteria_count' => 8],
            ['title' => 'Master', 'criteria_count' => 10],
        ];

        foreach ($badges as $badge) {
            Badge::create($badge);
        }
    }
}
