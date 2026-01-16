<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Family;
use App\Models\Schedule;
use App\Models\Task;
use Illuminate\Database\Seeder;

final class ScheduleSeeder extends Seeder
{
    public function run(): void
    {
        $family = Family::query()->first();
        if (! $family) {
            return;
        }

        $tasks = Task::query()->where('family_id', $family->id)->get();

        foreach ($tasks as $task) {
            if ($task->title === 'Escovar os dentes') {
                Schedule::query()->create([
                    'family_id' => $family->id,
                    'task_id' => $task->id,
                    'days_of_week' => ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'],
                    'start_time' => '08:00',
                    'window_start' => '07:30',
                    'window_end' => '09:00',
                    'duration_minutes' => 5,
                    'is_active' => true,
                ]);
            } elseif ($task->title === 'Arrumar a cama') {
                Schedule::query()->create([
                    'family_id' => $family->id,
                    'task_id' => $task->id,
                    'days_of_week' => ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'],
                    'start_time' => '07:30',
                    'window_start' => '07:00',
                    'window_end' => '09:00',
                    'duration_minutes' => 10,
                    'is_active' => true,
                ]);
            } elseif ($task->title === 'Fazer o dever de casa') {
                Schedule::query()->create([
                    'family_id' => $family->id,
                    'task_id' => $task->id,
                    'days_of_week' => ['monday', 'tuesday', 'wednesday', 'thursday', 'friday'],
                    'start_time' => '14:00',
                    'window_start' => '13:00',
                    'window_end' => '18:00',
                    'duration_minutes' => 60,
                    'is_active' => true,
                ]);
            } elseif ($task->title === 'Organizar os brinquedos') {
                Schedule::query()->create([
                    'family_id' => $family->id,
                    'task_id' => $task->id,
                    'days_of_week' => ['monday', 'wednesday', 'friday'],
                    'start_time' => '19:00',
                    'window_start' => '17:00',
                    'window_end' => '20:00',
                    'duration_minutes' => 20,
                    'is_active' => true,
                ]);
            } elseif ($task->title === 'Ler um livro') {
                Schedule::query()->create([
                    'family_id' => $family->id,
                    'task_id' => $task->id,
                    'days_of_week' => ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'],
                    'start_time' => '20:00',
                    'window_start' => '19:00',
                    'window_end' => '21:00',
                    'duration_minutes' => 15,
                    'is_active' => true,
                ]);
            } elseif ($task->title === 'Praticar instrumento musical') {
                Schedule::query()->create([
                    'family_id' => $family->id,
                    'task_id' => $task->id,
                    'days_of_week' => ['tuesday', 'thursday', 'saturday'],
                    'start_time' => '16:00',
                    'window_start' => '15:00',
                    'window_end' => '18:00',
                    'duration_minutes' => 30,
                    'is_active' => true,
                ]);
            }
        }
    }
}
