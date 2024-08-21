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
        Schema::table('family_law_step_4', function (Blueprint $table) {
            $table->string('case_title')->nullable();
            $table->text('citation_details')->nullable();
            $table->text('headnote_relevant_laws')->nullable();
            $table->text('case_facts')->nullable();
            $table->text('court_verdict')->nullable();
            $table->text('additional_info')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('family_law_step_4', function (Blueprint $table) {
            $table->dropColumn('case_title');
            $table->dropColumn('citation_details');
            $table->dropColumn('headnote_relevant_laws');
            $table->dropColumn('case_facts');
            $table->dropColumn('court_verdict');
            $table->dropColumn('additional_info');
        });
    }
};
