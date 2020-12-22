<?php

namespace Database\Factories;

use App\Models\jorong;
use App\Models\nagari;
use Illuminate\Database\Eloquent\Factories\Factory;

class JorongFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = jorong::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->unique()->streetAddress,
            'nagari_id' => $this->faker->numberBetween(1,Nagari::count()),
        ];
    }
}


