<?php

namespace Database\Seeders;

use App\Models\Departure;
use App\Models\Pilgrim;
use App\Models\Payment;
use Illuminate\Database\Seeder;

class PilgrimSeeder extends Seeder
{
    public function run(): void
    {
        $departures = Departure::all();

        foreach ($departures as $departure) {
            $pilgrim = Pilgrim::create([
                'tenant_id' => $departure->tenant_id,
                'departure_id' => $departure->id,
                'name' => 'Jamaah ' . fake()->name(),
                'nik' => fake()->numerify('################'),
                'phone' => fake()->phoneNumber(),
                'status' => 'deposit_paid',
            ]);

            Payment::create([
                'tenant_id' => $departure->tenant_id,
                'pilgrim_id' => $pilgrim->id,
                'amount' => 5000000,
                'payment_date' => now()->toDateString(),
                'payment_method' => 'Bank Transfer',
                'note' => 'DP Umrah',
            ]);
        }
    }
}
