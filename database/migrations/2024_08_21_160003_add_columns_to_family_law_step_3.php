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
        Schema::table('family_law_step_3', function (Blueprint $table) {
            $table->string('group_name');
            $table->string('dissolution_grounds')->nullable();
            $table->string('enactments_provisions')->nullable();
            $table->string('rules_provisions')->nullable();
            $table->text('relevant_caselaw')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('family_law_step_3', function (Blueprint $table) {
            $table->dropColumn([
                'group_name',
                'dissolution_grounds',
                'enactments_provisions',
                'rules_provisions',
                'relevant_caselaw'
            ]);
        });
    }
};
