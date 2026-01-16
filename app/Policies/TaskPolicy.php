<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Task;
use App\Models\User;

final class TaskPolicy
{
    public function viewAny(): bool
    {
        return true;
    }

    public function view(User $user, Task $task): bool
    {
        return $user->belongsToFamily($task->family_id);
    }

    public function create(): bool
    {
        return true;
    }

    public function update(User $user, Task $task): bool
    {
        return $user->isParentInFamily($task->family_id);
    }

    public function delete(User $user, Task $task): bool
    {
        return $user->isParentInFamily($task->family_id);
    }

    public function restore(User $user, Task $task): bool
    {
        return $user->isParentInFamily($task->family_id);
    }

    public function forceDelete(User $user, Task $task): bool
    {
        return $user->isParentInFamily($task->family_id);
    }
}
