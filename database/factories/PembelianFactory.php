<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Pembelian;
use App\Models\RefSupplier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pembelian>
 */
class PembelianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Pembelian::class;

    public function definition(): array
    {
        $this->faker = \Faker\Factory::create('id_ID');

        return [
            'id_supplier' => RefSupplier::inRandomOrder()->first()->id_supplier,
            'tgl_po' => $this->faker->date(),
            'status' => $this->faker->randomElement(['pending', 'disetujui', 'ditolak']),
            'id_pegawai' => Admin::inRandomOrder()->first()->id,
            'disetujui_oleh' => $this->faker->optional()->numberBetween(1, 3),
            'disetujui_tgl' => $this->faker->optional()->date(),
            'tgl_kirim' => $this->faker->optional()->date(),
            'created_at' => now(),
        ];
    }
}
