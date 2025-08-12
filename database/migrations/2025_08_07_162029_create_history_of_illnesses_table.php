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
        Schema::create('history_of_illnesses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('queue_id')->nullable()->constrained()->onDelete('cascade');
            $table->text('description'); // this stores the history of illness
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_of_illnesses');
    }
};
