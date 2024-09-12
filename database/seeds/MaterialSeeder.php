<?php

namespace Database\Seeders;

use App\Models\RefMaterial;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RefMaterial::factory(50)->create();
    }
}
