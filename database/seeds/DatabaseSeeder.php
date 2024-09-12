<?php

use Database\Seeders\MaterialSeeder;
use Database\Seeders\PembelianDetailSeeder;
use Database\Seeders\PembelianSeeder;
use Database\Seeders\SupplierSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(RolePermissionSeeder::class);
        $this->call(MaterialSeeder::class);
        $this->call(SupplierSeeder::class);
        // $this->call(PembelianSeeder::class);
        // $this->call(PembelianDetailSeeder::class);
    }
}
