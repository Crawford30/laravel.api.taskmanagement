<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserCreationTest extends TestCase
{
    use RefreshDatabase;

    /** CREATE USER WITH DEFAULT STATUSES */
    public function creates_user_with_default_status()
    {
        $user = User::factory()->create();

        $this->assertDatabaseHas('statuses', [
            'user_id' => $user->id,
            'title' => 'To Do'
        ]);

        $this->assertDatabaseHas('statuses', [
            'user_id' => $user->id,
            'title' => 'In Progress'
        ]);

        $this->assertDatabaseHas('statuses', [
            'user_id' => $user->id,
            'title' => 'Done'
        ]);
    }
}
