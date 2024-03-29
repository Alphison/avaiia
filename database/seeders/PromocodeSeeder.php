<?php

namespace Database\Seeders;

use App\Models\Promocode;
use Illuminate\Database\Seeder;

class PromocodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Promocode::create([
            'promocode' => 'ANNUSHKA',
            'value' => 10,
            'type' => 1
        ]);

        Promocode::create([
            'promocode' => 'LIZA',
            'value' => 10,
            'type' => 1
        ]);
    }
}
