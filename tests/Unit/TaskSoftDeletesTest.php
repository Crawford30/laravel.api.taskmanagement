<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskSoftDeletesTest extends TestCase
{
    use RefreshDatabase;

    /** TEST SAVES MEMEBERS AND TAGS */
    public function it_saves_members_and_tags_correctly()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create([
            'user_id' => $user->id,
            'members' => json_encode([
                ['id' => 1, 'name' => 'Member One'],
                ['id' => 2, 'name' => 'Member Two']
            ]),
            'tags' => json_encode([
                ['id' => 1, 'tag_name' => 'Tag One', 'tag_color' => '#FF5733'],
                ['id' => 2, 'tag_name' => 'Tag Two', 'tag_color' => '#33FF57']
            ])
        ]);

        $this->assertEquals([
            ['id' => 1, 'name' => 'Member One'],
            ['id' => 2, 'name' => 'Member Two']
        ], json_decode($task->members, true));

        $this->assertEquals([
            ['id' => 1, 'tag_name' => 'Tag One', 'tag_color' => '#FF5733'],
            ['id' => 2, 'tag_name' => 'Tag Two', 'tag_color' => '#33FF57']
        ], json_decode($task->tags, true));
    }
}
