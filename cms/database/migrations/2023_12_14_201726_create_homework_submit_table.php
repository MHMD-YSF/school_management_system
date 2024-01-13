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
        Schema::create('homework_submit', function (Blueprint $table) {
            $table->id();
            $table->integer('homework_id')->nullable();
            $table->integer('student_id')->nullable();
            $table->text('description')->nullable();
            $table->string('document_file', 255)->nullable();
            $table->timestamps();

            $table->foreign('homework_id')->references('id')->on('homework')->onDelete('set null');
            $table->foreign('student_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homework_submit');
    }
};
