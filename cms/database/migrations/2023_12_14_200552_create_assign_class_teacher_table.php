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
        Schema::create('assign_class_teacher', function (Blueprint $table) {
            $table->id();
            $table->integer('class_id')->nullable();
            $table->integer('teacher_id')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('is_delete')->default(0);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('set null');
            $table->foreign('teacher_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assign_class_teacher');
    }
};
