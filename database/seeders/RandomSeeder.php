<?php

namespace Database\Seeders;

use Database\Seeders\MainSeeders\AdminSeeder;
use Database\Seeders\MainSeeders\CategorySeeder;
use Database\Seeders\MainSeeders\CompanyAndSupplierSeeder;
use Database\Seeders\MainSeeders\PermissionSeeder;
use Database\Seeders\MainSeeders\ProductDetailSeeder;
use Database\Seeders\MainSeeders\ProductSeeder;
use Database\Seeders\MainSeeders\ProductUnitSeeder;
use Database\Seeders\MainSeeders\StoreProductSeeder;
use Database\Seeders\MainSeeders\StoreSeeder;
use Database\Seeders\MainSeeders\UnitSeeder;
use Database\Seeders\MainSeeders\UserSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RandomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategorySeeder::class,
            CompanyAndSupplierSeeder::class,
            PermissionSeeder::class,
            ProductSeeder::class,
            UnitSeeder::class,
            UserSeeder::class,
            StoreSeeder::class,
            ProductUnitSeeder::class,
            StoreProductSeeder::class,
            ProductDetailSeeder::class
        ]);
    }
}
