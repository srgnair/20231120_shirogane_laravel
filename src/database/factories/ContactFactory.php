<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'last_name' => $this->faker->name(),
            'first_name' => $this->faker->name(),
            'gender' => $this->faker->randomElement(['1', '2']),
            //$faker->randomElement($gender)?
            'email' => $this->faker->email(),
            'postcode' => $this->faker->regexify('[1-9]{3}-[0-9]{4}'),
            'address' => $this->faker->address(),
            'building_name' => $this->faker->city(),
            'opinion' => $this->faker->realText(120)
        ];
    }
}
