<?php

declare(strict_types=1);

namespace App\DataTransferObjects\Task;

use App\Enums\Priority;
use App\Enums\TaskType;
use NoDiscard;

final readonly class TaskDTO
{
    public function __construct(
        public string $familyId,
        public string $childUserId,
        public string $title,
        public TaskType $type,
        public Priority $priority,
        public int $weight = 1,
        public ?string $description = null,
        public ?int $defaultDurationMinutes = null,
        public bool $isActive = true,
    ) {}

    /**
     * @return array<string, mixed>
     */
    #[NoDiscard]
    public function toArray(): array
    {
        return [
            'family_id' => $this->familyId,
            'child_user_id' => $this->childUserId,
            'title' => $this->title,
            'description' => $this->description,
            'type' => $this->type,
            'priority' => $this->priority,
            'weight' => $this->weight,
            'default_duration_minutes' => $this->defaultDurationMinutes,
            'is_active' => $this->isActive,
        ];
    }

    public function withType(TaskType $type): self
    {
        return new self(
            familyId: $this->familyId,
            childUserId: $this->childUserId,
            title: $this->title,
            type: $type,
            priority: $this->priority,
            weight: $this->weight,
            description: $this->description,
            defaultDurationMinutes: $this->defaultDurationMinutes,
            isActive: $this->isActive,
        );
    }

    public function withPriority(Priority $priority): self
    {
        return new self(
            familyId: $this->familyId,
            childUserId: $this->childUserId,
            title: $this->title,
            type: $this->type,
            priority: $priority,
            weight: $this->weight,
            description: $this->description,
            defaultDurationMinutes: $this->defaultDurationMinutes,
            isActive: $this->isActive,
        );
    }

    public function deactivate(): self
    {
        return new self(
            familyId: $this->familyId,
            childUserId: $this->childUserId,
            title: $this->title,
            type: $this->type,
            priority: $this->priority,
            weight: $this->weight,
            description: $this->description,
            defaultDurationMinutes: $this->defaultDurationMinutes,
            isActive: false,
        );
    }
}
