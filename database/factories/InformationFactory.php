<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Information>
 */
class InformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = ['male','female'];
        $cash = [1000,2000,3000,4000];
        return [
            'firstname' => fake()->firstName(),
            'middlename' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'email' => fake()->email(),
            'phonenumber' => 9003245,
            'gender' => $gender[array_rand($gender)],
            'age' => fake()->numberBetween(12,21),
            'school' => fake()->company(),
            'address' => fake()->address(),
            'fee' => $cash[array_rand($cash)],
            'schedule_id' => fake()->numberBetween(1,6)
        ];
    }
}
