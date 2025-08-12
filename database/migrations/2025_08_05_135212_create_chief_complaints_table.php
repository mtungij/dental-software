<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up()
{
    Schema::create('chief_complaints', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('patient_id'); // Or visit_id depending on your system
        $table->text('complaint')->nullable();
        $table->timestamps();

        $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chief_complaints');
    }
};
