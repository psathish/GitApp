<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use App\Models\Task;
class TaskTest extends TestCase
{
    public function test_task_rendering(): void
    {
        $task = Task::factory()->create([
            'title' => 'Team sync',
            'date' => '2025-07-11 09:00:00'
        ]);

        $this->assertEquals('Team sync', $task->title);
    }

   

}
