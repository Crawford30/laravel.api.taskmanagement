<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'user_id' => 1,
                'category_name' => 'Development',
                'category_color' => '#FF9622',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 2,
                'category_name' => 'Design',
                'category_color' => '#FF9622',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 1,
                'category_name' => 'UX/UI',
                'category_color' => '#FF9622',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'user_id' => 2,
                'category_name' => 'Requirement Gathering',
                'category_color' => '#FF9622',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ]);
    }
}
