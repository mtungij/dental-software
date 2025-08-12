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
             DB::statement("ALTER TABLE queues MODIFY status ENUM('waiting', 'diagnosing', 'pending_payment', 'paid', 'done') NOT NULL DEFAULT 'waiting'");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('queues', function (Blueprint $table) {
         DB::statement("ALTER TABLE queues MODIFY status ENUM('waiting', 'seen') NOT NULL DEFAULT 'waiting'");
        });
    }
};
