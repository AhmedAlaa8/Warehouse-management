<?php

namespace Database\Seeders\MainSeeders;

use App\Services\Authorization\PermissionsService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissionService = new PermissionsService();
        $permissionService->seedPermissions();

        $this->command->info("Permission Table Seeded Successfully");
    }
}
