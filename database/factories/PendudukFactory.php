<?php

namespace Database\Factories;

use App\Models\penduduk;
use App\Models\kartu_keluarga;
use App\Models\level_pendidikan;
use App\Models\pekerjaan;
use App\Models\kewarganegaraan;
use Illuminate\Database\Eloquent\Factories\Factory;

class PendudukFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = penduduk::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       $agama = ["Islam", "Protestan", "Katolik", "Hindu", "Buddha", "Konghucu", "Lainnya"];
        $jenis_kelamin = ["Laki-Laki", "Perempuan"]; 
        $status_pernikahan = ["Menikah", "Belum Menikah"];
        $status_keluarga = ["Kepala Keluarga", "Istri", "Anak"];


        return [
            'kartu_keluarga_id' => $this->faker->numberBetween(1, kartu_keluarga::count()),
            'nama' => $this->faker->firstName." ".$this->faker->lastName,
            'nik' => $this->faker->nik(),
            'tempat_lahir' => $this->faker->city,
            'tanggal_lahir' => $this->faker->dateTimeBetween('-80 years', '-17 years'),
            'agama' => $this->faker->randomElement($agama),
            'jenis_kelamin' => $this->faker->randomElement($jenis_kelamin),
            'level_pendidikan_id' => $this->faker->numberBetween(1, level_pendidikan::count()),
            'pekerjaan_id' => $this->faker->numberBetween(1, pekerjaan::count()),
            'status_pernikahan' => $this->faker->randomElement($status_pernikahan),
            'status_keluarga' => $this->faker->randomElement($status_keluarga),
            'kewarganegaraan_id' => $this->faker->numberBetween(1, kewarganegaraan::count()),
            'ayah' => $this->faker->firstNameMale." ".$this->faker->lastNameMale,
            'ibu' => $this->faker->firstNameFemale." ".$this->faker->lastNameFemale,
        ];
    }
}

