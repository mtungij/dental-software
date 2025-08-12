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
        Schema::table('medicines', function (Blueprint $table) {
            $table->decimal('buy_price', 10, 2)->default(0);
            $table->decimal('sell_price', 10, 2)->default(0);
            $table->integer('stock_limit')->default(0);
            $table->dropColumn(['fast_track_price', 'standard_price']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('medicines', function (Blueprint $table) {
            $table->dropColumn(['buy_price', 'sell_price', 'stock_limit']);
            $table->decimal('fast_track_price', 10, 2)->default(0);
            $table->decimal('standard_price', 10, 2)->default(0);
        });
    }
};
