<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskUpdateTest extends TestCase
{
    use RefreshDatabase;

    /** TEST UPDATE TASK */
    public function it_updates_a_task_correctly()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create([
            'user_id' => $user->id,
            'task_name' => 'Original Task Name',
            'task_priority' => 'low'
        ]);

        $updatedData = [
            'task_name' => 'Updated Task Name',
            'task_priority' => 'high'
        ];

        $task->update($updatedData);

        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            'task_name' => 'Updated Task Name',
            'task_priority' => 'high'
        ]);
    }
}
