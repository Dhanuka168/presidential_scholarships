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
        Schema::create('al_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('al_exam_id');
            $table->foreign('al_exam_id')->references('id')->on('al_exams');
            $table->unsignedBigInteger('al_sub_id');
            $table->foreign('al_sub_id')->references('id')->on('al_subjects');
            $table->unsignedBigInteger('stream_id');
            $table->foreign('stream_id')->references('id')->on('al_streams');
            $table->string('result',3)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('al_results');
    }
};
