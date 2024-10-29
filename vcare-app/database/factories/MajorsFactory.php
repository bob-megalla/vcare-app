<?php

namespace Database\Factories;

use App\Models\Majors;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Majors>
 */
class MajorsFactory extends Factory
{
    protected $model = Majors::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            // 'name_major' => Majors::factory(), // for forign id of user
            'name_major' => fake()->name(),
            'img_major' => fake()->title(),
            // 'description' => fake()->paragraph(),

        ];
    }
}
