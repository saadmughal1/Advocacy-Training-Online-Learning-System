<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('training_material', function (Blueprint $table) {
            $table->string('file_name')->after('material'); // Adjust the position if needed
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('training_material', function (Blueprint $table) {
            $table->dropColumn('file_name');
        });
    }
};
