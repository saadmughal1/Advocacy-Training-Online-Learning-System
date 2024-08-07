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
        $tables = [
            'family_law_step_1',
            'family_law_step_2',
            'family_law_step_3',
            'family_law_step_4',
            'family_law_step_5',
            'family_law_step_6',
            'family_law_step_7',
            'family_law_step_8',
            'family_law_step_9',
            'family_law_step_10',
            'family_law_step_11',
            'family_law_step_12',
            'family_law_step_13',
            'family_law_step_14'
        ];

        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->dropForeign(['advisor_case_id']);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $tables = [
            'family_law_step_1',
            'family_law_step_2',
            'family_law_step_3',
            'family_law_step_4',
            'family_law_step_5',
            'family_law_step_6',
            'family_law_step_7',
            'family_law_step_8',
            'family_law_step_9',
            'family_law_step_10',
            'family_law_step_11',
            'family_law_step_12',
            'family_law_step_13',
            'family_law_step_14'
        ];

        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->foreign('advisor_case_id')->references('id')->on('advisor_cases')->onDelete('cascade');
            });
        }
    }
};
