<?php

namespace Database\Factories;

use App\Models\Suppliers;
use Illuminate\Database\Eloquent\Factories\Factory;

class SuppliersFactory extends Factory
{
    protected $model = Suppliers::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $id = 1;

        return [
            'supplier_code' => 'SUC' . $id++,
            'supplier_name' => $this->faker->name(),
            'supplier_address' => $this->faker->address(),
            'supplier_city' => $this->faker->city(),
            'supplier_phone' => $this->faker->city()
        ];
    }
}
