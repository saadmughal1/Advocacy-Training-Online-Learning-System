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
            'family_law_step_14',
        ];

        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->string('file_attachment')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $tables = [
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
            'family_law_step_14',
        ];

        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->dropColumn('file_attachment');
            });
        }
    }
};
