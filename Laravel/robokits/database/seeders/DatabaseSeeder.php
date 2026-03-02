<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // IMPORTANTE

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
        GroupSeeder::class,
        RoboticsKitSeeder::class,
        UserSeeder::class,
        CourseSeeder::class,
        ]);
    }
}