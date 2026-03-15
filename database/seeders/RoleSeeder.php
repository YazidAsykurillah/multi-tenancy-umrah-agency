<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create Global Roles (System Users)
        setPermissionsTeamId(null);
        $this->call(PermissionSeeder::class);
        
        Role::firstOrCreate(['name' => 'Super Admin', 'team_id' => null]);
        Role::firstOrCreate(['name' => 'Admin', 'team_id' => null]);
        Role::firstOrCreate(['name' => 'Customer Service', 'team_id' => null]);

        Tenant::all()->each(function (Tenant $tenant) {
            setPermissionsTeamId($tenant->id);
            
            $ownerRole = Role::firstOrCreate(['name' => 'Owner', 'team_id' => $tenant->id]);
            $adminRole = Role::firstOrCreate(['name' => 'Admin', 'team_id' => $tenant->id]);
            
            // Assign Owner role to all users currently in this tenant
            $tenant->users->each(function (User $user) use ($ownerRole) {
                $user->assignRole($ownerRole);
            });
        });
    }
}
