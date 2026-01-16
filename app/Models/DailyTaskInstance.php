<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\TaskInstanceStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class DailyTaskInstance extends Model
{
    use HasFactory;
    use HasUuids;

    protected function casts(): array
    {
        return [
            'date' => 'date',
            'status' => TaskInstanceStatus::class,
            'completed_at' => 'datetime',
            'scheduled_start_time' => 'datetime:H:i',
            'actual_start_time' => 'datetime:H:i',
            'actual_duration_minutes' => 'integer',
        ];
    }

    public function family(): BelongsTo
    {
        return $this->belongsTo(Family::class);
    }

    public function schedule(): BelongsTo
    {
        return $this->belongsTo(Schedule::class);
    }

    public function child(): BelongsTo
    {
        return $this->belongsTo(User::class, 'child_user_id');
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
    protected function forDate(Builder $query, string $date): Builder
    {
        return $query->whereDate('date', $date);
    }

    #[\Illuminate\Database\Eloquent\Attributes\Scope]
    protected function pending(Builder $query): Builder
    {
        return $query->where('status', TaskInstanceStatus::Pending);
    }

    #[\Illuminate\Database\Eloquent\Attributes\Scope]
    protected function done(Builder $query): Builder
    {
        return $query->where('status', TaskInstanceStatus::Done);
    }

    public function markAsDone(): void
    {
        $this->update([
            'status' => TaskInstanceStatus::Done,
            'completed_at' => now(),
        ]);
    }

    public function markAsSkipped(): void
    {
        $this->update([
            'status' => TaskInstanceStatus::Skipped,
        ]);
    }

    public function cancel(): void
    {
        $this->update([
            'status' => TaskInstanceStatus::Cancelled,
        ]);
    }
}
