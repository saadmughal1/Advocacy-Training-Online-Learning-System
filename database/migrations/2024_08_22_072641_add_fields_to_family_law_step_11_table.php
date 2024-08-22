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
        Schema::table('family_law_step_11', function (Blueprint $table) {
            $table->text('opening_para_facts')->nullable();
            $table->text('second_para_issues')->nullable();
            $table->text('third_para_evidence')->nullable();
            $table->text('fourth_para_relevant_law')->nullable();
            $table->text('fifth_para_relevant_case_law')->nullable();
            $table->text('sixth_para_closing_prayer')->nullable();
            $table->json('outlook_based')->nullable();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('family_law_step_11', function (Blueprint $table) {
            $table->dropColumn([
                'opening_para_facts',
                'second_para_issues',
                'third_para_evidence',
                'fourth_para_relevant_law',
                'fifth_para_relevant_case_law',
                'sixth_para_closing_prayer',
                'outlook_based'
            ]);
        });
    }

    
};
