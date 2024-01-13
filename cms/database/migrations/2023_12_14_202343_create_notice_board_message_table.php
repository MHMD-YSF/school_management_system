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
        Schema::create('notice_board_message', function (Blueprint $table) {
            $table->id();
            $table->integer('notice_board_id')->nullable();
            $table->integer('message_to')->nullable()->comment('user type');
            $table->timestamps();

            $table->foreign('notice_board_id')->references('id')->on('notice_board')->onDelete('set null');
            $table->foreign('message_to')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notice_board_message');
    }
};
