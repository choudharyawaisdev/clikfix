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
        Schema::table('worker_jobs', function (Blueprint $table) {
             $table->unsignedBigInteger('category_id')->after('id'); // Add category_id column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('worker_jobs', function (Blueprint $table) {
            $table->dropColumn('category_id');
        });
    }
};
