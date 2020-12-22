<?php

namespace Database\Factories;

use App\Models\kewarganegaraan;
use Illuminate\Database\Eloquent\Factories\Factory;

class KewarganegaraanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = kewarganegaraan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
         'nama' => $this->faker->unique()->country,
        ];
    }
}



