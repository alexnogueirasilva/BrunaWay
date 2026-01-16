<?php

declare(strict_types=1);

namespace App\DataTransferObjects\Family;

use NoDiscard;

final readonly class FamilyDTO
{
    public function __construct(
        public string $name,
        public ?string $description = null,
    ) {}

    /**
     * @return array<string, mixed>
     */
    #[NoDiscard]
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
        ];
    }
}
