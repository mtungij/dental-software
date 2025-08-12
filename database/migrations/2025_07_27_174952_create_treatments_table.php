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
    Schema::create('treatments', function (Blueprint $table) {
        $table->id();

        $table->foreignId('visit_id')->constrained()->onDelete('cascade');
        $table->foreignId('treatment_master_id')->constrained()->onDelete('cascade');

        $table->string('tooth')->nullable(); // e.g., UR6, LL3

        $table->decimal('price', 10, 2)->default(0);             // Recorded price at time of treatment
        $table->decimal('fast_track_price', 10, 2)->default(0);  // Recorded fast track price
        $table->boolean('is_fast_track')->default(false);        // Flag: was this fast-tracked?

        $table->text('remarks')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treatments');
    }
};
