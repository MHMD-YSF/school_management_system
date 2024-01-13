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
        Schema::create('class_subject_timetable', function (Blueprint $table) {
            $table->id();
            $table->integer('class_id')->nullable();
            $table->integer('subject_id')->nullable();
            $table->integer('week_id')->nullable();
            $table->string('start_time', 25)->nullable();
            $table->string('end_time', 25)->nullable();
            $table->string('room_number', 255)->nullable();
            $table->timestamps();

            $table->foreign('class_id')->references('id')->on('classes')->onDelete('set null');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('set null');
            $table->foreign('week_id')->references('id')->on('weeks')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_subject_timetable');
    }
};
