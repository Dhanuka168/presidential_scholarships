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
        Schema::create('ol_exams', function (Blueprint $table) {
            $table->id();
            $table->string('school',100)->nullable(false);
            $table->integer('year')->nullable(false);
            $table->integer('index_no')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ol_exams');
    }
};
