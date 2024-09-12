<?php

namespace Database\Seeders;

use App\Models\RefSupplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // generate 10 data supplier
        RefSupplier::factory()->count(10)->create();
    }
}
