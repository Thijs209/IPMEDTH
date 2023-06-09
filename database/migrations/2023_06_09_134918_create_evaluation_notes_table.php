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
        Schema::create('evaluation_notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pop_id')->constrained();
            $table->foreignId('evaluation_note_type_id')->constrained();
            $table->string('evaluation_note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluation_notes');
    }
};
