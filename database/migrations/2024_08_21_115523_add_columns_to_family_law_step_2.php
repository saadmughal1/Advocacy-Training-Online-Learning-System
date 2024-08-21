<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('family_law_step_2', function (Blueprint $table) {
            // Adding new columns
            $table->string('group_name')->nullable();
            $table->string('plaintiff_name')->nullable();
            $table->string('defendant_name')->nullable();
            $table->string('wife_residence')->nullable();
            $table->integer('number_of_children')->nullable();
            $table->decimal('wife_income', 10, 2)->nullable();
            $table->decimal('husband_income', 10, 2)->nullable();
            $table->text('clash_reason')->nullable();
            $table->text('wife_prayers')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('family_law_step_2', function (Blueprint $table) {
            // Dropping the columns if needed
            $table->dropColumn([
                'group_name',
                'plaintiff_name',
                'defendant_name',
                'wife_residence',
                'number_of_children',
                'wife_income',
                'husband_income',
                'clash_reason',
                'wife_prayers',
            ]);
        });
    }
};
