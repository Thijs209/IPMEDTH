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
        Schema::create('core_quadrants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pop_id')->constrained();
            $table->string('core_quality')->nullable();
            $table->string('pitfall')->nullable();
            $table->string('allergy')->nullable();
            $table->string('challenge')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('core_quadrants');
    }
};