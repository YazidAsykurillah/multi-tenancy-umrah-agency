<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::firstOrCreate(['name' => 'access_central_panel']);

        // 2. Define Tenant Management Permissions
        $tenantPermissions = [
            'view_tenants',
            'create_tenants',
            'edit_tenants',
            'delete_tenants',
        ];

        foreach ($tenantPermissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // 3. Define Global User Management Permissions
        $userPermissions = [
            'view_global_users',
            'create_global_users',
            'edit_global_users',
            'delete_global_users',
        ];

        foreach ($userPermissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // 4. Define Role and Permission Management Permissions
        $managementPermissions = [
            'view_roles',
            'create_roles',
            'edit_roles',
            'delete_roles',
            'view_permissions',
            'create_permissions',
            'edit_permissions',
            'delete_permissions',
        ];

        foreach ($managementPermissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // 5. Assign Permissions to Roles (Global Context)
        setPermissionsTeamId(null);

        $adminRole = Role::where('name', 'Admin')->where('team_id', null)->first();
        if ($adminRole) {
            $adminRole->givePermissionTo([
                'access_central_panel',
                'view_tenants',
                'view_global_users',
                'edit_global_users',
            ]);
        }
        
        // Note: Super Admin doesn't need explicit permission assignment 
        // because of the Gate::before check in AppServiceProvider.
    }
}
