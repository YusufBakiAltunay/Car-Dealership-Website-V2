<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Car permission
        Permission::create(['name' => 'create car']);
        Permission::create(['name' => 'edit car']);
        Permission::create(['name' => 'delete car']);
        Permission::create(['name' => 'index car']);
        Permission::create(['name' => 'show car']);

        // Car Model permission
        Permission::create(['name' => 'create carModel']);
        Permission::create(['name' => 'edit carModel']);
        Permission::create(['name' => 'delete carModel']);
        Permission::create(['name' => 'index carModel']);
        Permission::create(['name' => 'show carModel']);

        // Fuel type permission
        Permission::create(['name' => 'create fuelType']);
        Permission::create(['name' => 'edit fuelType']);
        Permission::create(['name' => 'delete fuelType']);
        Permission::create(['name' => 'index fuelType']);
        Permission::create(['name' => 'show fuelType']);

        // Brand permission
        Permission::create(['name' => 'create brand']);
        Permission::create(['name' => 'edit brand']);
        Permission::create(['name' => 'delete brand']);
        Permission::create(['name' => 'index brand']);
        Permission::create(['name' => 'show brand']);

        // Car price permission
        Permission::create(['name' => 'create priceCar']);
        Permission::create(['name' => 'edit priceCar']);
        Permission::create(['name' => 'delete priceCar']);
        Permission::create(['name' => 'index priceCar']);
        Permission::create(['name' => 'show priceCar']);

        // Product permission
        Permission::create(['name' => 'create product']);
        Permission::create(['name' => 'edit product']);
        Permission::create(['name' => 'delete product']);
        Permission::create(['name' => 'index product']);
        Permission::create(['name' => 'show product']);

        //Garage Services permission
        Permission::create(['name' => 'create garage-service']);
        Permission::create(['name' => 'edit garage-service']);
        Permission::create(['name' => 'delete garage-service']);
        Permission::create(['name' => 'index garage-service']);
        Permission::create(['name' => 'show garage-service']);


        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());
    }
}
