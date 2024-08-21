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
        Schema::create('advisor_case_student', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('advisor_case_id');
            $table->unsignedBigInteger('student_id');
            // $table->foreign('advisor_case_id')->references('id')->on('advisor_cases')->onDelete('cascade');
            // $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advisor_case_student');
    }
};
