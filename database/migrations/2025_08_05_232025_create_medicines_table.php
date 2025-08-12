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
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->decimal('standard_price', 10, 2);
            $table->decimal('fast_track_price', 10, 2);
            $table->integer('quantity_per_container')->default(1);
            $table->integer('total_quantity')->default(0); // stock in units
            $table->string('container')->nullable(); // e.g. "Box of 30 tablets"
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
};
