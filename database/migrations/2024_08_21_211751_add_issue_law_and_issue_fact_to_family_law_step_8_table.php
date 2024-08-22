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
        Schema::table('family_law_step_8', function (Blueprint $table) {
            $table->json('issue_law')->nullable();
            $table->json('issue_fact')->nullable();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('family_law_step_8', function (Blueprint $table) {
            $table->dropColumn('issue_law');
            $table->dropColumn('issue_fact');
        });
    }
};
