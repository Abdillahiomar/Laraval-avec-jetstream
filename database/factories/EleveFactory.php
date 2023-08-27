<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Eleve;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Eleve>
 */
class EleveFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Nom' => $this->faker->name(),
            'Nom_pere' => $this->faker->name(),
            'Nom_mere' => $this->faker->name(),
            'tel_pere' => $this->faker->phoneNumber,
            'tel_mere' => $this->faker->phoneNumber,
            'email_pere' => $this->faker->unique()->safeEmail(),
            'email_mere' => $this->faker->unique()->safeEmail(),
            'sexe' => $this->faker->randomElement($array = array ('garçon', 'fille')),
            'date_naissance' => $this->faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
            'classe_id' => $this->faker->randomElement($array = array (1, 2)),
            'photo' => $this->faker->text(8),
        ];
    }
}
