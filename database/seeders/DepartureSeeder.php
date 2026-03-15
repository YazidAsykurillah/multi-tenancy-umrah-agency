<?php

namespace Database\Seeders;

use App\Models\Departure;
use App\Models\Package;
use Illuminate\Database\Seeder;

class DepartureSeeder extends Seeder
{
    public function run(): void
    {
        $packages = Package::all();

        foreach ($packages as $package) {
            Departure::create([
                'tenant_id' => $package->tenant_id,
                'package_id' => $package->id,
                'departure_date' => now()->addMonths(2)->toDateString(),
                'return_date' => now()->addMonths(2)->addDays($package->duration_days)->toDateString(),
                'quota' => 45,
                'status' => 'published',
            ]);

            Departure::create([
                'tenant_id' => $package->tenant_id,
                'package_id' => $package->id,
                'departure_date' => now()->addMonths(4)->toDateString(),
                'return_date' => now()->addMonths(4)->addDays($package->duration_days)->toDateString(),
                'quota' => 45,
                'status' => 'draft',
            ]);
        }
    }
}
