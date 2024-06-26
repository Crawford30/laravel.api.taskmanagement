<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\CategoriesTableSeeder;
use Database\Seeders\ProjectsTableSeeder;
use Database\Seeders\TagsTableSeeder;
use Database\Seeders\TasksTableSeeder;
use Database\Seeders\UsersTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        $this->call([
            UsersTableSeeder::class,
            StatusesTableSeeder::class,
            ProjectsTableSeeder::class,
            TagsTableSeeder::class,
            CategoriesTableSeeder::class,
            TasksTableSeeder::class,
        ]);

    }
}
