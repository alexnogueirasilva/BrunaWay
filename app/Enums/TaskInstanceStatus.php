<?php

declare(strict_types=1);

namespace App\Enums;

enum TaskInstanceStatus: string
{
    case Pending = 'pending';
    case Done = 'done';
    case Skipped = 'skipped';
    case Cancelled = 'cancelled';

    public function label(): string
    {
        return match ($this) {
            self::Pending => 'Pendente',
            self::Done => 'Concluída',
            self::Skipped => 'Pulada',
            self::Cancelled => 'Cancelada',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Pending => 'zinc',
            self::Done => 'green',
            self::Skipped => 'orange',
            self::Cancelled => 'red',
        };
    }

    public function countsForPerformance(): bool
    {
        return match ($this) {
            self::Pending, self::Skipped => false,
            self::Done => true,
            self::Cancelled => false,
        };
    }
}
