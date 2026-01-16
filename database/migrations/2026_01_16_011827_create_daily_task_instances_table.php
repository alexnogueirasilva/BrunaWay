<?php

declare(strict_types=1);

use App\Enums\TaskInstanceStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('daily_task_instances', static function (Blueprint $table): void {
            $table->uuid('id')->primary();
            $table->foreignUuid('family_id')->constrained()->cascadeOnDelete();
            $table->foreignUuid('schedule_id')->constrained()->cascadeOnDelete();
            $table->foreignUuid('child_user_id')->constrained('users')->cascadeOnDelete();
            $table->date('date');
            $table->string('status')->default(TaskInstanceStatus::Pending->value);
            $table->timestamp('completed_at')->nullable();
            $table->time('scheduled_start_time');
            $table->time('actual_start_time')->nullable();
            $table->integer('actual_duration_minutes')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->index('family_id');
            $table->index('schedule_id');
            $table->index('child_user_id');
            $table->index(['child_user_id', 'date']);
            $table->index(['family_id', 'date']);
            $table->index('status');
            $table->unique(['schedule_id', 'date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('daily_task_instances');
    }
};
