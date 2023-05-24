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
        Schema::create('doel_stappens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doel_id')->constrained('doelens', 'id');
            $table->integer('stap');
            $table->string('beschrijving');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doel_stappens');
    }
};
