<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Project Code',
                'email' => 'projectcode@gmail.com',
                'color' => '#FF9655',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('projectcode'),
                'remember_token' => \Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Joel Crawford',
                'email' => 'joelcrawford40@gmail.com',
                'color' => '#FF4655',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('joelcrawford'),
                'remember_token' => \Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Jane Mwe',
                'email' => 'janemwe@yahoo.com',
                'color' => '#FF9622',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('janemwe'),
                'remember_token' => \Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ]);
    }
}
