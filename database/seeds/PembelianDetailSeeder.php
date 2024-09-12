<?php

namespace Database\Seeders;

use App\Models\PembelianDetail;
use Illuminate\Database\Seeder;

class PembelianDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PembelianDetail::factory(20)->create();
    }
}
