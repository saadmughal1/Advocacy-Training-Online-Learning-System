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
        Schema::create('cases', function (Blueprint $table) {
            $table->id();
            $table->string('case_name'); 

            // Columns for Step 1
            $table->text('step_1_introduction')->nullable();
            $table->text('step_1_instructions')->nullable();
            $table->string('step_1_video')->nullable();

            // Columns for Step 2
            $table->text('step_2_introduction')->nullable();
            $table->text('step_2_instructions')->nullable();

            // Columns for Step 3
            $table->text('step_3_introduction')->nullable();
            $table->text('step_3_instructions')->nullable();

            // Columns for Step 4
            $table->text('step_4_introduction')->nullable();
            $table->text('step_4_instructions')->nullable();

            // Columns for Step 5
            $table->text('step_5_introduction')->nullable();
            $table->text('step_5_instructions')->nullable();

            // Columns for Step 6
            $table->text('step_6_introduction')->nullable();
            $table->text('step_6_instructions')->nullable();

            // Columns for Step 7
            $table->text('step_7_introduction')->nullable();
            $table->text('step_7_instructions')->nullable();
            $table->string('step_7_video')->nullable();

            // Columns for Step 8
            $table->text('step_8_introduction')->nullable();
            $table->text('step_8_instructions')->nullable();

            // Columns for Step 9
            $table->text('step_9_introduction')->nullable();
            $table->text('step_9_instructions')->nullable();
            $table->string('step_9_video')->nullable(); 

            // Columns for Step 10
            $table->text('step_10_introduction')->nullable();
            $table->text('step_10_instructions')->nullable();
            $table->string('step_10_video')->nullable(); 

            // Columns for Step 11
            $table->text('step_11_introduction')->nullable();
            $table->text('step_11_instructions')->nullable();
            $table->string('step_11_video')->nullable(); 

            // Columns for Step 12
            $table->text('step_12_introduction')->nullable();
            $table->text('step_12_instructions')->nullable();
            $table->string('step_12_video')->nullable();

            // Columns for Step 13
            $table->text('step_13_introduction')->nullable();
            $table->text('step_13_instructions')->nullable();

            // Columns for Step 14
            $table->text('step_14_introduction')->nullable();
            $table->text('step_14_instructions')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cases');
    }
};
