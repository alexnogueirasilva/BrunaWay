<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\Priority;
use App\Enums\Role;
use App\Enums\TaskType;
use App\Models\Family;
use App\Models\Task;
use Illuminate\Database\Seeder;

final class TaskSeeder extends Seeder
{
    public function run(): void
    {
        $family = Family::query()->first();
        if (! $family) {
            return;
        }

        /** @var \App\Models\User|null $child */
        $child = $family->users()
            ->wherePivot('role', Role::Child->value)
            ->first();

        if (! $child) {
            return;
        }

        $tasks = [
            [
                'title' => 'Escovar os dentes',
                'description' => 'Escovar os dentes após o café da manhã',
                'type' => TaskType::Fixed,
                'priority' => Priority::High,
                'weight' => 2,
                'default_duration_minutes' => 5,
            ],
            [
                'title' => 'Arrumar a cama',
                'description' => 'Arrumar a cama logo ao acordar',
                'type' => TaskType::Fixed,
                'priority' => Priority::High,
                'weight' => 2,
                'default_duration_minutes' => 10,
            ],
            [
                'title' => 'Fazer o dever de casa',
                'description' => 'Completar todas as tarefas escolares',
                'type' => TaskType::Flexible,
                'priority' => Priority::High,
                'weight' => 3,
                'default_duration_minutes' => 60,
            ],
            [
                'title' => 'Organizar os brinquedos',
                'description' => 'Guardar todos os brinquedos nos seus lugares',
                'type' => TaskType::Flexible,
                'priority' => Priority::Medium,
                'weight' => 2,
                'default_duration_minutes' => 20,
            ],
            [
                'title' => 'Ler um livro',
                'description' => 'Ler pelo menos 15 minutos por dia',
                'type' => TaskType::Optional,
                'priority' => Priority::Medium,
                'weight' => 1,
                'default_duration_minutes' => 15,
            ],
            [
                'title' => 'Praticar instrumento musical',
                'description' => 'Praticar violão por 30 minutos',
                'type' => TaskType::Optional,
                'priority' => Priority::Low,
                'weight' => 1,
                'default_duration_minutes' => 30,
            ],
        ];

        foreach ($tasks as $taskData) {
            Task::query()->create([
                ...$taskData,
                'family_id' => $family->id,
                'child_user_id' => $child->id,
                'is_active' => true,
            ]);
        }
    }
}
