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
        Schema::table('family_law_step_10', function (Blueprint $table) {
            $table->text('oath_taking')->nullable();
            $table->text('address_party_witness_statement')->nullable();
            $table->text('signature_party_witness')->nullable();
            $table->text('counter_signature_judge')->nullable();
            $table->text('straight_questions')->nullable();
            $table->text('no_leading_questions')->nullable();
            $table->text('objections_other_party')->nullable();
            $table->text('statement_according_pleadings')->nullable();
            $table->text('impeach_credit_witness')->nullable();
            $table->text('only_relevant_questions')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('family_law_step_10', function (Blueprint $table) {
            $table->dropColumn([
                'oath_taking',
                'address_party_witness_statement',
                'signature_party_witness',
                'counter_signature_judge',
                'straight_questions',
                'no_leading_questions',
                'objections_other_party',
                'statement_according_pleadings',
                'impeach_credit_witness',
                'only_relevant_questions'
            ]);
        });
    }
};
