<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    public function run(): void
    {
        Tenant::firstOrCreate(['slug' => 'al-fatih'], [
            'name' => 'Al-Fatih Travel',
            'is_active' => true,
        ]);

        Tenant::firstOrCreate(['slug' => 'haramain'], [
            'name' => 'Haramain Express',
            'is_active' => true,
        ]);
    }
}
