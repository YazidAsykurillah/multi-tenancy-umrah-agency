<?php

namespace Database\Seeders;

use App\Models\Package;
use App\Models\Tenant;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        $alfatih = Tenant::where('slug', 'al-fatih')->first();
        $haramain = Tenant::where('slug', 'haramain')->first();

        // Packages for Al-Fatih
        Package::create([
            'tenant_id' => $alfatih->id,
            'name' => 'Umrah Regular 9 Days',
            'price' => 25000000,
            'duration_days' => 9,
            'airline' => 'Saudi Arabian Airlines',
            'hotel' => 'Makkah Tower',
            'description' => 'Paket umrah reguler dengan fasilitas bintang 5.',
        ]);

        Package::create([
            'tenant_id' => $alfatih->id,
            'name' => 'Umrah Plus Turkey 12 Days',
            'price' => 35000000,
            'duration_days' => 12,
            'airline' => 'Turkish Airlines',
            'hotel' => 'Pullman Zamzam',
            'description' => 'Paket umrah plus jalan-jalan ke Turki.',
        ]);

        // Packages for Haramain
        Package::create([
            'tenant_id' => $haramain->id,
            'name' => 'Umrah Hemat Ramadhan',
            'price' => 45000000,
            'duration_days' => 30,
            'airline' => 'Garuda Indonesia',
            'hotel' => 'Anjum Hotel',
            'description' => 'Paket umrah full Ramadhan.',
        ]);
    }
}
