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
        Schema::create('kernkwadrants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pop_id')->constrained();
            $table->string('kern_kwaliteit');
            $table->string('valkuil');
            $table->string('allergie');
            $table->string('uitdaging');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kernkwadrants');
    }
};
