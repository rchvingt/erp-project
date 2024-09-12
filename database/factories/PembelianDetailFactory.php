<?php

namespace Database\Factories;

use App\Models\Pembelian;
use App\Models\PembelianDetail;
use App\Models\RefMaterial;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PembelianDetail>
 */
class PembelianDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = PembelianDetail::class;

    public function definition(): array
    {
        $this->faker = \Faker\Factory::create('id_ID');

        return [
            'id_po' => Pembelian::inRandomOrder()->first()->id_po,
            'id_material' => RefMaterial::inRandomOrder()->first()->id_material,
            'qty' => $this->faker->numberBetween(1, 100),
            'harga' => $this->faker->randomFloat(2, 1000, 10000),
            'total' => $this->faker->randomFloat(2, 1000, 10000),
            'created_at' => now(),
        ];
    }
}
