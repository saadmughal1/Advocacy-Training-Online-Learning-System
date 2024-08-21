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
        Schema::table('family_law_step_7', function (Blueprint $table) {
            $table->text('reconciliator_intro')->nullable();
            $table->text('confidentiality_assurance')->nullable();
            $table->text('individual_session')->nullable();
            $table->text('joint_session')->nullable();
            $table->text('neutrality_impartiality')->nullable();
            $table->text('change_positions')->nullable();
            $table->text('reach_suggestions')->nullable();
            $table->text('finalize_suggestions')->nullable();
            $table->text('reach_agreement')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('family_law_step_7', function (Blueprint $table) {
            $table->dropColumn([
                'reconciliator_intro',
                'confidentiality_assurance',
                'individual_session',
                'joint_session',
                'neutrality_impartiality',
                'change_positions',
                'reach_suggestions',
                'finalize_suggestions',
                'reach_agreement'
            ]);
        });
    }
};
