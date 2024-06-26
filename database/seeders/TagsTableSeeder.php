<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tags')->insert([
            [
                'user_id' => 1,
                'tag_name' => 'Urgent',
                'tag_color' => '#FF9622',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 1,
                'tag_name' => 'Important',
                'tag_color' => '#FF9622',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'user_id' => 1,
                'tag_name' => 'Very Urgent',
                'tag_color' => '#FF9622',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ]);
    }
}
