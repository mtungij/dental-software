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
        Schema::create('treatment_masters', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // e.g., "Tooth Extraction"
            $table->decimal('price', 10, 2); // Standard price
            $table->decimal('fast_track_price', 10, 2); // Fast track price
            $table->text('description')->nullable(); // Optional explanation
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treatment_masters');
    }
};
