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
        Schema::create('student_add_fees', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id')->nullable();
            $table->integer('class_id')->nullable();
            $table->integer('total_amount')->default(0);
            $table->integer('paid_amount')->default(0);
            $table->integer('remaining_amount')->default(0);
            $table->string('payment_type', 255)->nullable();
            $table->text('remark')->nullable();
            $table->tinyInteger('is_payment')->default(0);
            $table->string('stripe_session_id', 255)->nullable();
            $table->text('payment_data')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('set null');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_add_fees');
    }
};
