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
        Schema::table('early_bird_moot_step_1', function (Blueprint $table) {
            $table->unsignedBigInteger('aid')->nullable();
        });

        Schema::table('early_bird_moot_step_2', function (Blueprint $table) {
            $table->unsignedBigInteger('aid')->nullable();
        });
    }

    public function down()
    {
        Schema::table('early_bird_moot_step_1', function (Blueprint $table) {
            $table->dropColumn('aid');
        });

        Schema::table('early_bird_moot_step_2', function (Blueprint $table) {
            $table->dropColumn('aid');
        });
    }
};
