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
        Schema::create('doelens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pop_id')->constrained();
            $table->foreignId('doel_soort')->constrained('doelen_soorts', 'id');
            $table->string('wat');
            $table->string('waarom');
            $table->string('tevreden');
            $table->string('ondersteuning');
            $table->date('deadline');
            $table->string('feedback');
            $table->string('soort');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doelens');
    }
};
