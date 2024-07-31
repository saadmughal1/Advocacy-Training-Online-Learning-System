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
        Schema::rename('cases', 'family_law_cases');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('cases', 'family_law_cases');
    }
};
