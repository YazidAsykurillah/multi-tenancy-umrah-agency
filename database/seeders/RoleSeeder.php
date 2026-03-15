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

        // We create owner and admin roles for EACH tenant
        // However, with Spatie Teams, we just create them once and the team_id handles the scoping
        // Actually, we need to create the roles with team_id = null first if we want them to be templates,
        // or just create them per tenant.
        
        // The common way is to set the team_id before creating the role.
        
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
