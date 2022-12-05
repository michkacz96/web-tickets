<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $create = $this->faker->numberBetween(0, 50000);
        if($create < 24999){
            $type = 'E';
            $value = $this->faker->safeEmail();
        }else{
            $type = 'P';
            $value = $this->faker->e164PhoneNumber();
        }

        return [
            'customer_id' => $this->faker->numberBetween(1, 10),
            'type' => $type,
            'value' => $value
        ];
    }
}
