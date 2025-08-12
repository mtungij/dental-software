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
      Schema::create('invoice_medicines', function (Blueprint $table) {
    $table->id();
    $table->foreignId('invoice_id')->constrained()->onDelete('cascade');
    $table->foreignId('medicine_id')->constrained()->onDelete('cascade');
    $table->string('dosage')->nullable();
    $table->string('frequency')->nullable();
    $table->decimal('price', 10, 2);
    $table->decimal('subtotal', 10, 2);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_medicines');
    }
};
