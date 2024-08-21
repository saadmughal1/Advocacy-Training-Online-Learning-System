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
        Schema::table('family_law_step_5', function (Blueprint $table) {
            $table->text('court_name')->nullable();
            $table->text('plaintiff_details')->nullable();
            $table->text('defendant_details')->nullable();
            $table->text('plaint_subject')->nullable();
            $table->text('cause_of_action')->nullable();
            $table->text('territorial_jurisdiction')->nullable();
            $table->integer('court_fee')->nullable();
            $table->text('relief_claimed')->nullable();
            $table->text('witnesses_count')->nullable();
            $table->text('witnesses_details')->nullable();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('family_law_step_5', function (Blueprint $table) {
            $table->dropColumn('court_name');
            $table->dropColumn('plaintiff_details');
            $table->dropColumn('defendant_details');
            $table->dropColumn('plaint_subject');
            $table->dropColumn('cause_of_action');
            $table->dropColumn('territorial_jurisdiction');
            $table->dropColumn('court_fee');
            $table->dropColumn('relief_claimed');
            $table->dropColumn('witnesses_count');
            $table->dropColumn('witnesses_details');
        });
    }
};
