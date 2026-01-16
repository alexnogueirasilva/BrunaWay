<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Schedule;
use App\Models\User;

final class SchedulePolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Schedule $schedule): bool
    {
        return $user->belongsToFamily($schedule->family_id);
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Schedule $schedule): bool
    {
        return $user->isParentInFamily($schedule->family_id);
    }

    public function delete(User $user, Schedule $schedule): bool
    {
        return $user->isParentInFamily($schedule->family_id);
    }

    public function restore(User $user, Schedule $schedule): bool
    {
        return $user->isParentInFamily($schedule->family_id);
    }

    public function forceDelete(User $user, Schedule $schedule): bool
    {
        return $user->isParentInFamily($schedule->family_id);
    }
}
