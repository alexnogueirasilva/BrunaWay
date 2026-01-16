<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\Priority;
use App\Enums\TaskType;
use App\Traits\HasFullTextSearch;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

final class Task extends Model
{
    use HasFactory;
    use HasFullTextSearch;
    use HasUuids;
    use SoftDeletes;

    protected function casts(): array
    {
        return [
            'type' => TaskType::class,
            'priority' => Priority::class,
            'weight' => 'integer',
            'default_duration_minutes' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    public function family(): BelongsTo
    {
        return $this->belongsTo(Family::class);
    }

    public function child(): BelongsTo
    {
        return $this->belongsTo(User::class, 'child_user_id');
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }

    #[\Illuminate\Database\Eloquent\Attributes\Scope]
    protected function active(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    #[\Illuminate\Database\Eloquent\Attributes\Scope]
    protected function forFamily(Builder $query, string $familyId): Builder
    {
        return $query->where('family_id', $familyId);
    }

    #[\Illuminate\Database\Eloquent\Attributes\Scope]
    protected function forChild(Builder $query, string $childUserId): Builder
    {
        return $query->where('child_user_id', $childUserId);
    }

    #[\Illuminate\Database\Eloquent\Attributes\Scope]
    protected function search(Builder $query, string $term): Builder
    {
        $this->applyFullTextSearch($query, $term, ['title', 'description']);

        return $query;
    }
}
