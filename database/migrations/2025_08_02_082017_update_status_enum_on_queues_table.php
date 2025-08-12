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
        Schema::table('queues', function (Blueprint $table) {
         $table->enum('status', ['waiting', 'seen','called_in', 'investigation', 'diagnosing'])->default('waiting')->change();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('queues', function (Blueprint $table) {
              $table->enum('status', ['waiting', 'seen', 'investigation'])->default('waiting')->change();
        });
    }
};
