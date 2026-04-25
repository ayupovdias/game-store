<?php

namespace Database\Factories;

use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title"=>$this->faker->sentence(3),
            "description"=>$this->faker->sentence(10),
            "price"=>$this->faker->numberBetween(0, 50000),
            "genre_id"=>$this->faker->numberBetween(1,5)
        ];
    }
}
