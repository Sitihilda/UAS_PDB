<?php

namespace Database\Factories;

use App\Models\pekerjaan;
use Illuminate\Database\Eloquent\Factories\Factory;

class PekerjaanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = pekerjaan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $pekerjaan = [ "PNS", "ASN", "Buruh", "Wiraswasta", "Petani", "Ibu Rumah Tangga", "Pelajar/Mahasiswa", "Tidak Bekerja"];


        return [
            'nama' => $this->faker->unique()->randomElement($pekerjaan),
        ];
    }
}


