<?php

namespace Database\Seeders;

use App\Models\Clinic;
use App\Models\Comment;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            UserSeeder::class,
            CommentSeeder::class,
            PostSeeder::class,
            ClinicSeeder::class,
            ProcedureCategoriesSeeder::class,
            ProceduresSeeder::class,
        ]);

    }
}
