<?php

declare(strict_types=1);

namespace App\Actions\Family;

use App\DataTransferObjects\Family\FamilyDTO;
use App\Models\Family;

final class CreateFamilyAction
{
    public function handle(FamilyDTO $dto): Family
    {
        return Family::query()->create($dto->toArray());
    }
}
