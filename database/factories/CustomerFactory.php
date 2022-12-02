<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $type = $this->faker->randomElement(['B', 'I']);
        $name = $type == 'I' ? $this->faker->unique()->name() : $this->faker->unique->company();
        $tin = $type == 'B' ? $this->faker->unique()->numberBetween(1000000000, 9999999999) : null;
        return [
            'type' => $type,
            'name' => $name,
            'full_name' => $name,
            'address' => $this->faker->streetName(),
            'building_number' => $this->faker->buildingNumber(),
            'postal_code' => $this->faker->postCode(),
            'city' => $this->faker->city(),
            'country' => $this->faker->country(),
            'tin_ssn' => $tin
        ];
    }
}
