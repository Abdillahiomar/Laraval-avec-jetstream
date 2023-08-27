<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Matiere>
 */
class MatiereFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom_matiere' => $this->faker->word,
            'code_matiere' => $this->faker->unique()->numberBetween(1000, 9999),
            'coefficient' => $this->faker->randomFloat(3, 5, 4),
            'module_id' => $this->faker->randomElement($array = array (1, 2)),
        ];
    }
}
