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
        Schema::create('personal_information', function (Blueprint $table) {
            $table->id();
            $table->string('full_name', 100)->nullable(false);
            $table->string('name_with_initials', 50)->nullable(false);
            $table->date('date_of_birth')->nullable(false);
            $table->tinyInteger('gender')->nullable(false);
            $table->string('nic_number', 12)->nullable(false);
            $table->string('address', 200)->nullable(false);
            $table->string('email', 255)->nullable();
            $table->integer('mobile')->nullable(false);
            $table->integer('land_line')->nullable();
            $table->string('nic_doc_path', 255)->nullable(false);
            $table->integer('batch_number')->nullable(false);
            $table->unsignedBigInteger('provincial_id');
            $table->foreign('provincial_id')->references('id')->on('provinces');
            $table->unsignedBigInteger('district_id');
            $table->foreign('district_id')->references('id')->on('districts');
            $table->unsignedBigInteger('ds_id');
            $table->foreign('ds_id')->references('id')->on('divisional_secretariats');
            $table->unsignedBigInteger('institute_id');
            $table->foreign('institute_id')->references('id')->on('institutes');
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->unsignedBigInteger('course_town_id');
            $table->foreign('course_town_id')->references('id')->on('course_towns');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_information');
    }
};
