<?php

namespace Database\Factories;

use App\Models\pegawai;
use Faker\Provider\id_ID\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

class PegawaiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = pegawai::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $fakerId = \Faker\Factory::create('id_ID');
        return [
            'nik' => $fakerId->nik(),
            'nama_lengkap' => $this->faker->name(),
            'jenis_kelamin' => $this->faker->randomElement(['pria', 'wanita']),
            'tgl_lahir' => $this->faker->dateTimeBetween($startDate = '-30 years', $endDate= '-20 years'),
            'alamat_lengkap' => $this->faker->streetAddress,
            'departemen_id' => $this->faker->numberBetween($min=1, $max=4)
        ];
    }
}
