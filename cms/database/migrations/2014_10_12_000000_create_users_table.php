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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('admission_number')->nullable();
            $table->string('roll_number')->nullable();
            $table->integer('class_id')->nullable();
            $table->string('gender')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('caste')->nullable();
            $table->string('religion')->nullable();
            $table->string('mobile_number')->nullable();
            $table->date('admission_date')->nullable();
            $table->string('profile_pic')->nullable();
            $table->string('blood_group', 10)->nullable();
            $table->string('height', 10)->nullable();
            $table->string('weight', 10)->nullable();
            $table->string('occupation')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('qualification', 1000)->nullable();
            $table->string('work_experience', 1000)->nullable();
            $table->text('note')->nullable();
            $table->tinyInteger('user_type')->default(3)->comment('1:admin, 2:teacher, 3: student, 4: parent');
            $table->tinyInteger('is_delete')->default(0)->comment('0:not deleted, 1 : deleted');
            $table->tinyInteger('status')->default(0)->comment('0:active, 1:inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
