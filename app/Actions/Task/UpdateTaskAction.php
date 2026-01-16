<?php

declare(strict_types=1);

namespace App\Actions\Task;

use App\DataTransferObjects\Task\TaskDTO;
use App\Models\Task;

final class UpdateTaskAction
{
    public function handle(Task $task, TaskDTO $dto): Task
    {
        $task->update($dto->toArray());

        return $task->fresh();
    }
}
