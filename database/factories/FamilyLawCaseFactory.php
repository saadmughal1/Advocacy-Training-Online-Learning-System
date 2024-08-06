<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FamilyLawCase>
 */
class FamilyLawCaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */ 
    protected $model = \App\Models\FamilyLawCase::class;

    public function definition()
    {
        return [
            'case_name' => $this->faker->sentence,
            'step_1_introduction' => $this->faker->paragraph,
            'step_1_instructions' => $this->faker->paragraph,
            'step_1_video' => $this->faker->url,
            'step_2_introduction' => $this->faker->paragraph,
            'step_2_instructions' => $this->faker->paragraph,
            'step_3_introduction' => $this->faker->paragraph,
            'step_3_instructions' => $this->faker->paragraph,
            'step_4_introduction' => $this->faker->paragraph,
            'step_4_instructions' => $this->faker->paragraph,
            'step_5_introduction' => $this->faker->paragraph,
            'step_5_instructions' => $this->faker->paragraph,
            'step_6_introduction' => $this->faker->paragraph,
            'step_6_instructions' => $this->faker->paragraph,
            'step_7_introduction' => $this->faker->paragraph,
            'step_7_instructions' => $this->faker->paragraph,
            'step_7_video' => $this->faker->url,
            'step_8_introduction' => $this->faker->paragraph,
            'step_8_instructions' => $this->faker->paragraph,
            'step_9_introduction' => $this->faker->paragraph,
            'step_9_instructions' => $this->faker->paragraph,
            'step_9_video' => $this->faker->url,
            'step_10_introduction' => $this->faker->paragraph,
            'step_10_instructions' => $this->faker->paragraph,
            'step_10_video' => $this->faker->url,
            'step_11_introduction' => $this->faker->paragraph,
            'step_11_instructions' => $this->faker->paragraph,
            'step_11_video' => $this->faker->url,
            'step_12_introduction' => $this->faker->paragraph,
            'step_12_instructions' => $this->faker->paragraph,
            'step_12_video' => $this->faker->url,
            'step_13_introduction' => $this->faker->paragraph,
            'step_13_instructions' => $this->faker->paragraph,
            'step_14_introduction' => $this->faker->paragraph,
            'step_14_instructions' => $this->faker->paragraph,
        ];
    }
}
