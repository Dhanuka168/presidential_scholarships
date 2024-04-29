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
        Schema::table('ol_exams', function (Blueprint $table) {
            $table->unsignedBigInteger('personal_information_id')->default(0);
            $table->foreign('personal_information_id')->references('id')->on('personal_information');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ol_exams', function (Blueprint $table) {
            //
        });
    }
};
