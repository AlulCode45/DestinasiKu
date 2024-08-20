<?php

namespace Database\Factories;

use App\Models\DestinationCompany;
use App\Models\District;
use App\Models\Provinces;
use App\Models\Regency;
use App\Models\Village;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Destinations>
 */
class DestinationsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Memilih provinsi secara acak
        $province = Provinces::inRandomOrder()->first();

        // Memilih kabupaten/kota berdasarkan provinsi
        $regency = Regency::where('province_id', $province->id)->inRandomOrder()->first();

        // Memilih kecamatan berdasarkan kabupaten/kota
        $district = District::where('regency_id', $regency->id)->inRandomOrder()->first();

        // Memilih desa/kelurahan berdasarkan kecamatan
        $village = Village::where('district_id', $district->id)->inRandomOrder()->first();

        return [
            'name' => $this->faker->company,
            'province_id' => $province->id, // ID provinsi
            'regency_id' => $regency->id,   // ID kabupaten/kota
            'district_id' => $district->id, // ID kecamatan
            'village_id' => $village->id,   // ID desa/kelurahan
            'destination_company_id' => DestinationCompany::factory(), // Menggunakan factory untuk foreign key
            'price' => $this->faker->numberBetween(100, 1000),
            'description' => $this->faker->text,
        ];
    }
}