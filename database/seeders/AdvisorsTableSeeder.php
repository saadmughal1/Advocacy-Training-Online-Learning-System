<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdvisorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $advisors = [];

        for ($i = 1; $i <= 50; $i++) {
            $advisors[] = [
                'username' => 'advisor' . $i,
                'email' => 'advisor' . $i . '@example.com',
                'phone_number' => '123-456-789' . $i,
                'password' => 1,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('advisors')->insert($advisors);
    }
}
