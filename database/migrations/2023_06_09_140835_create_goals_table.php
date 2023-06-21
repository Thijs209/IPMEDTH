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
        Schema::create('goals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pop_id')->constrained();
            $table->foreignId('goal_type_id')->constrained();
            $table->string('what')->nullable();
            $table->string('why')->nullable();
            $table->string('satisfied')->nullable();
            $table->string('support')->nullable();
            $table->date('deadline')->nullable();
            $table->string('feedback')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goals');
    }
};