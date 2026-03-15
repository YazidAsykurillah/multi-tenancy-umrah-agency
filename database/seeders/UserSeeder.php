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
        $admin = User::firstOrCreate(['email' => 'admin@example.com'], [
            'name' => 'Si Admin',
            'password' => Hash::make('password'),
        ]);

        $alfatih = Tenant::where('slug', 'al-fatih')->first();
        $haramain = Tenant::where('slug', 'haramain')->first();

        // Assign Admin to both tenants so they can log in
        $admin->tenants()->syncWithoutDetaching([$alfatih->id, $haramain->id]);

        $owner1 = User::firstOrCreate(['email' => 'owner@alfatih.com'], [
            'name' => 'Owner Al-Fatih',
            'password' => Hash::make('password'),
        ]);
        $owner1->tenants()->syncWithoutDetaching([$alfatih->id]);

        $owner2 = User::firstOrCreate(['email' => 'owner@haramain.com'], [
            'name' => 'Owner Haramain',
            'password' => Hash::make('password'),
        ]);
        $owner2->tenants()->syncWithoutDetaching([$haramain->id]);
    }
}
