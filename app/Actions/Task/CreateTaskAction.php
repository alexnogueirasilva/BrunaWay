<?php

declare(strict_types=1);

namespace App\Actions\Task;

use App\DataTransferObjects\Task\TaskDTO;
use App\Models\Task;

final class CreateTaskAction
{
    public function handle(TaskDTO $dto): Task
    {
        return Task::query()->create($dto->toArray());
    }
}
