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
            $table->unsignedBigInteger('advisor_id')->nullable()->after('id'); // Add advisor_id
            $table->unsignedBigInteger('admin_id')->nullable()->after('advisor_id'); // Add admin_id
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('training_material', function (Blueprint $table) {
            $table->dropColumn(['advisor_id', 'admin_id']); // Remove the columns on rollback
        });
    }
};
