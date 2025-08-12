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
       Schema::create('vital_signs', function (Blueprint $table) {
    $table->id();
    $table->foreignId('queue_id')->constrained()->cascadeOnDelete();
    $table->float('temperature');
    $table->string('blood_pressure');
    $table->integer('heart_rate');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vital_signs');
    }
};
