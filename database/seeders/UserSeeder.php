<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create Super Admin (Global User)
        $superAdmin = User::firstOrCreate(['email' => 'superadmin@example.com'], [
            'name' => 'Platform Super Admin',
            'password' => Hash::make('password'),
        ]);
        
        // Reset team context for global role assignment
        setPermissionsTeamId(null);
        $superAdmin->assignRole('Super Admin');

        // 2. Create Admin (Global User)
        $platformAdmin = User::firstOrCreate(['email' => 'admin@example.com'], [
            'name' => 'Si Admin',
            'password' => Hash::make('password'),
        ]);

        setPermissionsTeamId(null);
        $platformAdmin->assignRole('Admin');

        // 3. Create Tenant-Specific Users
        $alfatih = Tenant::where('slug', 'al-fatih')->first();
        $haramain = Tenant::where('slug', 'haramain')->first();

        // Owner 1
        $owner1 = User::firstOrCreate(['email' => 'owner@alfatih.com'], [
            'name' => 'Owner Al-Fatih',
            'password' => Hash::make('password'),
        ]);
        $owner1->tenants()->syncWithoutDetaching([$alfatih->id]);
        
        // Owner 2
        $owner2 = User::firstOrCreate(['email' => 'owner@haramain.com'], [
            'name' => 'Owner Haramain',
            'password' => Hash::make('password'),
        ]);
        $owner2->tenants()->syncWithoutDetaching([$haramain->id]);
    }
}
