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
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable()->after('email');
            $table->string('accademic_document')->nullable()->after('phone');
            $table->string('specialization')->nullable()->after('accademic_document');
            $table->string('photo')->nullable()->after('specialization');
            $table->string('gender')->nullable()->after('photo');
            $table->string('position')->nullable()->after('gender');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone');
            $table->dropColumn('accademic_document');
            $table->dropColumn('specialization');
            $table->dropColumn('photo');
            $table->dropColumn('gender');
            $table->dropColumn('position');
        });
    }
};
