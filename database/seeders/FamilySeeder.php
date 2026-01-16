<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\LifeStage;
use App\Enums\Role;
use App\Models\Family;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

final class FamilySeeder extends Seeder
{
    public function run(): void
    {
        $parent = User::query()->create([
            'name' => 'Maria Silva',
            'email' => 'maria@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        $child = User::query()->create([
            'name' => 'João Silva',
            'email' => 'joao@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        $family = Family::query()->create([
            'name' => 'Família Silva',
            'description' => 'Família demo para testar o sistema BrunaWay',
        ]);

        $family->users()->attach($parent->id, [
            'role' => Role::Parent->value,
        ]);

        $family->users()->attach($child->id, [
            'role' => Role::Child->value,
            'birthdate' => now()->subYears(10),
            'life_stage' => LifeStage::Kid->value,
            'life_stage_locked' => false,
        ]);
    }
}
