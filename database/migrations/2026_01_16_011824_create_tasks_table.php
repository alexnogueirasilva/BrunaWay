<?php

declare(strict_types=1);

use App\Priority;
use App\TaskType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tasks', static function (Blueprint $table): void {
            $table->uuid('id')->primary();
            $table->foreignUuid('family_id')->constrained()->cascadeOnDelete();
            $table->foreignUuid('child_user_id')->constrained('users')->cascadeOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('type')->default(TaskType::Flexible->value);
            $table->string('priority')->default(Priority::Medium->value);
            $table->integer('weight')->default(1);
            $table->integer('default_duration_minutes')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->index('family_id');
            $table->index('child_user_id');
            $table->index(['family_id', 'is_active']);
            $table->index('created_at');
        });

        if (DB::connection()->getDriverName() === 'pgsql') {
            DB::statement("
                CREATE INDEX tasks_fulltext_idx ON tasks
                USING GIN (to_tsvector('portuguese', title || ' ' || COALESCE(description, '')))
            ");
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
