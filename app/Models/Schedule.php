<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

final class Schedule extends Model
{
    use HasFactory;
    use HasUuids;
    use SoftDeletes;

    protected function casts(): array
    {
        return [
            'days_of_week' => 'array',
            'start_time' => 'datetime:H:i',
            'window_start' => 'datetime:H:i',
            'window_end' => 'datetime:H:i',
            'duration_minutes' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    public function family(): BelongsTo
    {
        return $this->belongsTo(Family::class);
    }

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    public function dailyTaskInstances(): HasMany
    {
        return $this->hasMany(DailyTaskInstance::class);
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
    protected function forDay(Builder $query, string $dayOfWeek): Builder
    {
        return $query->whereJsonContains('days_of_week', $dayOfWeek);
    }
}
