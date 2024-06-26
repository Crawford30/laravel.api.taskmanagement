<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tasks')->insert([
            [
                'user_id' => 1,
                'project_id' => 2,
                'status_id' => 1,
                'category_id' => 2,
                'task_name' => 'Task name 1',
                'start_date' => '2024-06-28',
                'end_date' => '2024-06-27',
                'description' => 'Description 1',
                'members' => json_encode([
                    [
                        "id" => 2,
                        "name" => "John Omara"
                    ],
                    [
                        "id" => 1,
                        "name" => "Joelcrawford"
                    ]
                ]),
                'tags' => json_encode([
                    [
                        "id" => 2,
                        "tag_name" => "UI/UX",
                        "tag_color" => "#810909"
                    ],
                    [
                        "id" => 1,
                        "tag_name" => "Prototype",
                        "tag_color" => "#FF9655"
                    ]
                ]),
                'task_priority' => 'low',
                'task_color' => '#FFD59D',
                'order' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 1,
                'project_id' => 2,
                'status_id' => 1,
                'category_id' => 2,
                'task_name' => 'Task name 2',
                'start_date' => '2024-06-28',
                'end_date' => '2024-06-27',
                'description' => 'Description 2',
                'members' => json_encode([
                    [
                        "id" => 2,
                        "name" => "John Omara"
                    ],
                    [
                        "id" => 1,
                        "name" => "Joelcrawford"
                    ]
                ]),
                'tags' => json_encode([
                    [
                        "id" => 2,
                        "tag_name" => "UI/UX",
                        "tag_color" => "#810909"
                    ],
                    [
                        "id" => 1,
                        "tag_name" => "Prototype",
                        "tag_color" => "#FF9655"
                    ]
                ]),
                'task_priority' => 'low',
                'task_color' => '#FFD59D',
                'order' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 1,
                'project_id' => 2,
                'status_id' => 1,
                'category_id' => 2,
                'task_name' => 'task name 3',
                'start_date' => '2024-06-28',
                'end_date' => '2024-06-27',
                'description' => 'Description 3',
                'members' => json_encode([
                    [
                        "id" => 2,
                        "name" => "John Omara"
                    ],
                    [
                        "id" => 1,
                        "name" => "Joelcrawford"
                    ]
                ]),
                'tags' => json_encode([
                    [
                        "id" => 2,
                        "tag_name" => "UI/UX",
                        "tag_color" => "#810909"
                    ],
                    [
                        "id" => 1,
                        "tag_name" => "Prototype",
                        "tag_color" => "#FF9655"
                    ]
                ]),
                'task_priority' => 'low',
                'task_color' => '#FFD59D',
                'order' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 1,
                'project_id' => 2,
                'status_id' => 1,
                'category_id' => 2,
                'task_name' => 'Task name 4',
                'start_date' => '2024-06-28',
                'end_date' => '2024-06-27',
                'description' => 'Description 4',
                'members' => json_encode([
                    [
                        "id" => 2,
                        "name" => "John Omara"
                    ],

                ]),
                'tags' => json_encode([
                    [
                        "id" => 2,
                        "tag_name" => "UI/UX",
                        "tag_color" => "#810909"
                    ],
                    [
                        "id" => 1,
                        "tag_name" => "Prototype",
                        "tag_color" => "#FF9655"
                    ]
                ]),
                'task_priority' => 'low',
                'task_color' => '#FFD59D',
                'order' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 1,
                'project_id' => 2,
                'status_id' => 1,
                'category_id' => 2,
                'task_name' => 'Task name 5',
                'start_date' => '2024-06-28',
                'end_date' => '2024-06-27',
                'description' => 'Description 5',
                'members' => json_encode([
                    [
                        "id" => 1,
                        "name" => "Joelcrawford"
                    ]
                ]),
                'tags' => json_encode([
                    [
                        "id" => 2,
                        "tag_name" => "UI/UX",
                        "tag_color" => "#810909"
                    ],
                    [
                        "id" => 1,
                        "tag_name" => "Prototype",
                        "tag_color" => "#FF9655"
                    ]
                ]),
                'task_priority' => 'low',
                'task_color' => '#FFD59D',
                'order' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
