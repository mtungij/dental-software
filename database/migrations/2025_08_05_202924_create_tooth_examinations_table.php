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
        Schema::create('tooth_examinations', function (Blueprint $table) {
           $table->id();
        $table->foreignId('patient_id')->constrained()->onDelete('cascade');
        $table->string('oral_hygiene')->nullable();
        $table->string('gum_condition')->nullable();
        $table->json('tooth_decay')->nullable();
        $table->string('missing_teeth')->nullable();
        $table->string('mobility')->nullable();
        $table->string('occlusion')->nullable();
        $table->text('other_findings')->nullable();
        $table->text('recommendation')->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tooth_examinations');
    }
};
