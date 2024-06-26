<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projects')->insert([
            [
                'user_id' => 1,
                'project_name' => 'Project Alpha',
                'project_color' => '#FF9622',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 2,
                'project_name' => 'Project Beta',
                'project_color' => '#FF9622',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'user_id' => 1,
                'project_name' => 'Project Beta',
                'project_color' => '#FF9622',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ]);
    }
}
