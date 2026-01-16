<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\DailyTaskInstance;
use App\Models\User;

final class DailyTaskInstancePolicy
{
    public function viewAny(): bool
    {
        return true;
    }

    public function view(User $user, DailyTaskInstance $dailyTaskInstance): bool
    {
        return $user->belongsToFamily($dailyTaskInstance->family_id);
    }

    public function create(): bool
    {
        return true;
    }

    public function update(User $user, DailyTaskInstance $dailyTaskInstance): bool
    {
        if ($user->isParentInFamily($dailyTaskInstance->family_id)) {
            return true;
        }

        return $this->canChildUpdateOwnTask($user, $dailyTaskInstance);
    }

    private function canChildUpdateOwnTask(User $user, DailyTaskInstance $dailyTaskInstance): bool
    {
        // @phpstan-ignore booleanAnd.alwaysFalse
        return $dailyTaskInstance->child_user_id === $user->id
            && $user->isChildInFamily($dailyTaskInstance->family_id);
    }

    public function delete(User $user, DailyTaskInstance $dailyTaskInstance): bool
    {
        return $user->isParentInFamily($dailyTaskInstance->family_id);
    }

    public function restore(User $user, DailyTaskInstance $dailyTaskInstance): bool
    {
        return $user->isParentInFamily($dailyTaskInstance->family_id);
    }

    public function forceDelete(User $user, DailyTaskInstance $dailyTaskInstance): bool
    {
        return $user->isParentInFamily($dailyTaskInstance->family_id);
    }
}
