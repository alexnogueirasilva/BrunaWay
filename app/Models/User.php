<?php

declare(strict_types=1);

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Fortify\TwoFactorAuthenticatable;

final class User extends Authenticatable
{
    use HasFactory;
    use HasUuids;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected $hidden = [
        'password',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function families(): BelongsToMany
    {
        return $this->belongsToMany(Family::class)
            ->withPivot(['role', 'birthdate', 'life_stage', 'life_stage_locked'])
            ->withTimestamps();
    }

    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->take(2)
            ->map(fn ($word) => Str::substr($word, 0, 1))
            ->implode('');
    }

    public function belongsToFamily(string $familyId): bool
    {
        return $this->families()->where('family_id', $familyId)->exists();
    }

    public function isParentInFamily(string $familyId): bool
    {
        return $this->families()
            ->where('family_id', $familyId)
            ->wherePivot('role', \App\Enums\Role::Parent->value)
            ->exists();
    }

    public function isChildInFamily(string $familyId): bool
    {
        return $this->families()
            ->where('family_id', $familyId)
            ->wherePivot('role', \App\Enums\Role::Child->value)
            ->exists();
    }
}
