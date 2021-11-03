<?php

namespace Database\Factories;

use App\Models\Patrons;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatronsFactory extends Factory
{
    protected $model = Patrons::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $id = 1;

        return [
            'patron_code' => 'SCP' . $id++,
            'patron_name' => $this->faker->name(),
            'patron_address' => $this->faker->address(),
            'patron_phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->freeEmail(),
        ];
    }
}
