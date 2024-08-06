<?php

namespace Database\Seeders;

use App\Models\FamilyLawCase;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FamilyLawCaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FamilyLawCase::factory()->count(200)->create();
    }
}
