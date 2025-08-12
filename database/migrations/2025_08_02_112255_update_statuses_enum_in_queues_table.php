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
            // Update the 'status' column to include all relevant dental clinic statuses
            $table->enum('status', [
                'waiting',
                'called_in',
                'consulting',
                'diagnosing',
                'invoice_created',
                'awaiting_payment',
                'under_treatment',
                'post_treatment',
                'follow_up',
                'completed',
                'investigation',
                'investigation_done'
            ])->default('waiting')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('queues', function (Blueprint $table) {
            // Rollback to previous status values
            $table->enum('status', [
                'waiting',
                'seen',
                'investigation',
                'diagnosing'
            ])->default('waiting')->change();
        });
    }
};
