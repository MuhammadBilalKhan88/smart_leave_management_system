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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_Id')->unique();
            $table->string('emp_name');
            $table->string('emp_email')->unique();
            $table->string('emp_phone')->unique();
            $table->string('emp_address')->nullable();
            $table->string('emp_departments')->nullable();
            $table->string('emp_position')->nullable();
            $table->decimal('emp_salary', 10, 2)->nullable();
            $table->date('emp_joining_date')->nullable();
            $table->string('emp_timing')->nullable();
            $table->string('emp_total_leaves')->default(15);
            $table->string('emp_total_taken')->default(0);
            $table->timestamps();
            $table->foreign('user_Id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
