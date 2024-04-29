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
        Schema::create('ol_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ol_exam_id');
            $table->foreign('ol_exam_id')->references('id')->on('ol_exams');
            $table->unsignedBigInteger('ol_sub_id');
            $table->foreign('ol_sub_id')->references('id')->on('ol_subjects');
            $table->string('result',1)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ol_results');
    }
};
