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
    Schema::create('patients', function (Blueprint $table) {
        $table->id();

        // Personal Info
        $table->string('name');
        $table->string('patient_number')->unique();
        $table->string('dob')->nullable(); // nullable date of birth

        // Extended Personal Info
        $table->enum('gender', ['Male', 'Female', 'Other'])->nullable();
        $table->enum('marital_status', ['Single', 'Married', 'Divorced', 'Widowed'])->nullable();
        $table->string('national_id')->unique()->nullable();

        // Contact Info
        $table->string('phone')->nullable();
        $table->string('email')->nullable();
        $table->text('address')->nullable();
        $table->string('emergency_name')->nullable();
        $table->string('emergency_phone')->nullable();

        // Medical Info
        $table->text('medical_history')->nullable();
        $table->text('allergies')->nullable();
        $table->enum('blood_group', ['A+', 'A−', 'B+', 'B−', 'AB+', 'AB−', 'O+', 'O−'])->nullable();
        $table->string('insurance_provider')->nullable();
        $table->string('insurance_number')->nullable();
        $table->text('conditions')->nullable();
        $table->text('medications')->nullable();

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
