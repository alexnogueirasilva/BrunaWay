<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Family;
use App\Models\User;

final class FamilyPolicy
{
    public function viewAny(): bool
    {
        return true;
    }

    public function view(User $user, Family $family): bool
    {
        return $user->belongsToFamily($family->id);
    }

    public function create(): bool
    {
        return true;
    }

    public function update(User $user, Family $family): bool
    {
        return $user->isParentInFamily($family->id);
    }

    public function delete(User $user, Family $family): bool
    {
        return $user->isParentInFamily($family->id);
    }

    public function restore(User $user, Family $family): bool
    {
        return $user->isParentInFamily($family->id);
    }

    public function forceDelete(User $user, Family $family): bool
    {
        return $user->isParentInFamily($family->id);
    }
}
