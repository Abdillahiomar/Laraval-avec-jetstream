<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Module>
 */
class ModuleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom_module' => $this->faker->word,
            'code_module' => $this->faker->unique()->numberBetween(1000, 9999),
            'credit' => $this->faker->randomFloat(3, 5, 4),
            'classe_id' => $this->faker->randomElement($array = array (1, 2,3,4,5)),
        ];
    }
}
