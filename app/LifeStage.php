<?php

declare(strict_types=1);

namespace App;

enum LifeStage: string
{
    case Kid = 'kid';
    case Teen = 'teen';
    case YoungAdult = 'young_adult';
    case Independent = 'independent';

    public function label(): string
    {
        return match ($this) {
            self::Kid => '6-12 anos',
            self::Teen => '13-17 anos',
            self::YoungAdult => '18+ (Mentor)',
            self::Independent => 'Independente',
        };
    }

    public function ageRange(): array
    {
        return match ($this) {
            self::Kid => [6, 12],
            self::Teen => [13, 17],
            self::YoungAdult => [18, 99],
            self::Independent => [18, 99],
        };
    }
}
