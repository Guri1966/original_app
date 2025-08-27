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
       Schema::table('words', function (Blueprint $table) {
            $table->unsignedInteger('correct_count')->default(0);
            $table->unsignedInteger('answer_count')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('words', function (Blueprint $table) {
             $table->dropColumn('correct_count');
        });
    }
};