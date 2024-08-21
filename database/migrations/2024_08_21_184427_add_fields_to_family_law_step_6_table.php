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
        Schema::table('family_law_step_6', function (Blueprint $table) {
            $table->text('court_name')->nullable()->after('id');
            $table->text('plaintiff_details')->nullable()->after('court_name');
            $table->text('defendant_details')->nullable()->after('plaintiff_details');
            $table->text('written_statement_subject')->nullable()->after('defendant_details');
            $table->text('new_facts')->nullable()->after('written_statement_subject');
            $table->text('denials')->nullable()->after('new_facts');
            $table->text('cause_of_action')->nullable()->after('denials');
            $table->text('territorial_jurisdiction')->nullable()->after('cause_of_action');
            $table->integer('court_fee')->nullable()->after('territorial_jurisdiction');
            $table->text('defendant_relief')->nullable()->after('court_fee');
            $table->text('verification')->nullable()->after('defendant_relief');
            $table->text('witnesses_number')->nullable()->after('verification');
            $table->text('witnesses_details')->nullable()->after('witnesses_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('family_law_step_6', function (Blueprint $table) {
            $table->dropColumn([
                'court_name',
                'plaintiff_details',
                'defendant_details',
                'written_statement_subject',
                'new_facts',
                'denials',
                'cause_of_action',
                'territorial_jurisdiction',
                'court_fee',
                'defendant_relief',
                'verification',
                'witnesses_number',
                'witnesses_details',
            ]);
        });
    }
};
