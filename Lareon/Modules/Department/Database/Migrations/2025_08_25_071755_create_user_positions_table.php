<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_positions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('department_id')->nullable()->constrained('departments')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('team_id')->nullable()->constrained('department_teams')->nullOnDelete()->cascadeOnUpdate();
            $table->string('position'); // 'head', 'manager', 'agent', 'senior_agent', ...
            $table->timestamps();

            $table->unique(['department_id', 'team_id', 'position', 'user_id'], 'unique_position_per_user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_positions');
    }
};
