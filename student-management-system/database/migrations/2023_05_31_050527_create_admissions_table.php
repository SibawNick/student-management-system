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
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('city');
            $table->string('street');
            $table->string('mobile');
            $table->string('email')->nullable();
            $table->foreignId('course_id')->constrained();
            $table->double('course_fee');
            $table->double('discount_percent')->nullable();
            $table->double('discount_amount')->nullable();
            $table->double('total_fee');
            $table->integer('no_of_installment')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admissions');
    }
};
