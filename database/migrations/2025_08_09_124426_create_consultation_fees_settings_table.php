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
        Schema::create('consultation_fee_settings', function (Blueprint $table) {
            $table->id();
            $table->decimal('standard_fee', 10, 2);
            $table->decimal('fast_track_fee', 10, 2);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultation_fees_settings');
    }
};
