<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classe>
 */
class ClasseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom_classe' => $this->faker->name(),
            'effectif' => $this->faker->randomDigit,
            'categorie_id' =>   $this->faker->randomElement($array = array (1, 2)),
        ];
    }
}
