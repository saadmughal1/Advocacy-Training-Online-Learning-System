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
        Schema::table('student_cases', function (Blueprint $table) {
            $table->unsignedBigInteger('acsid')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('student_cases', function (Blueprint $table) {
            $table->dropColumn('acsid');
        });
    }
};
