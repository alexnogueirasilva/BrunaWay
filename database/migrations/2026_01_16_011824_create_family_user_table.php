<?php

declare(strict_types=1);

use App\LifeStage;
use App\Role;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('family_user', static function (Blueprint $table): void {
            $table->uuid('id')->primary();
            $table->foreignUuid('family_id')->constrained()->cascadeOnDelete();
            $table->foreignUuid('user_id')->constrained()->cascadeOnDelete();
            $table->string('role')->default(Role::Child->value);
            $table->date('birthdate')->nullable();
            $table->string('life_stage')->default(LifeStage::Kid->value)->nullable();
            $table->boolean('life_stage_locked')->default(false);
            $table->timestamps();

            $table->unique(['family_id', 'user_id']);
            $table->index('family_id');
            $table->index('user_id');
            $table->index('role');
            $table->index('life_stage');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('family_user');
    }
};
