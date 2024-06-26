<?php

namespace Tests\Unit;


use Tests\TestCase;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskCreationTest extends TestCase
{
    use RefreshDatabase;

    /** TASK CREATION TEST */
    public function it_crates_a_task()
    {
        $user = User::factory()->create();

        $task = Task::factory()->create([
            'user_id' => $user->id,
            'project_id' => 1,
            'category_id' => 1,
            'status_id' => 1,
            'task_name' => 'Sample Task',
            'start_date' => '2024-06-28',
            'end_date' => '2024-06-29',
            'task_priority' => 'low',
        ]);

        $this->assertDatabaseHas('tasks', [
            'task_name' => 'Sample Task',
            'user_id' => $user->id
        ]);
    }
}
