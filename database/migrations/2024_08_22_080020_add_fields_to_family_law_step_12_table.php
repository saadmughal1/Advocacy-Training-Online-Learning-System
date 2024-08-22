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
        Schema::table('family_law_step_12', function (Blueprint $table) {
            // Procedural Skills
            $table->text('introduction_reconciliator')->nullable();
            $table->text('confidentiality_assurance')->nullable();

            // Coaxing
            $table->text('individual_session')->nullable();
            $table->text('joint_session')->nullable();

            // Substantive skills
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
        Schema::table('family_law_step_12', function (Blueprint $table) {
            // Drop the columns in case of rollback
            $table->dropColumn([
                'introduction_reconciliator',
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
