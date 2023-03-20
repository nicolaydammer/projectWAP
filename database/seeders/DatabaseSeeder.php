<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleScientist = Role::create(['name' => 'scientist']);
        $roleCusServ = Role::create(['name' => 'customer service']);

        //admin
        Permission::create(['name' => 'manage permission']);
        Permission::create(['name'=>'add worker']);
        Permission::create(['name'=>'delete worker']);

        //scientist
        Permission::create(['name'=>'add weather station']);
        Permission::create(['name'=>'delete weather station']);
        Permission::create(['name'=>'see weather data']);
        Permission::create(['name'=>'compare weather data']);
        Permission::create(['name'=>'handle outage']);

        //customer service
        Permission::create(['name'=>'see customers']);
        Permission::create(['name'=>'add contract']);
        Permission::create(['name'=>'change contract']);
        Permission::create(['name'=>'delete contract']);

        //

        $roleAdmin->givePermissionTo([
            'manage permission',
            'add worker',
            'delete worker']);

        $roleScientist->givePermissionTo([
            'add weather station',
            'delete weather station',
            'see weather data',
            'compare weather data',
            'handle outage']);

        $roleCusServ->givePermissionTo([
            'see customers',
            'add contract',
            'change contract',
            'delete contract']);

        $csPermissions = $roleCusServ->permissions->pluck('name');
        $scientistPermissions = $roleScientist->permissions->pluck('name');

        $roleScientist->givePermissionTo($csPermissions);
        $roleAdmin->givePermissionTo($csPermissions, $scientistPermissions);
    }
}
