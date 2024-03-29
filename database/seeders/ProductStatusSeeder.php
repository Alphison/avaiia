<?php

namespace Database\Seeders;

use App\Models\ProductStatus;
use Illuminate\Database\Seeder;

class ProductStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductStatus::create([
            'name' => 'sold out',
            'text' => 'sold out',
        ]);

//        ProductStatus::create([
//            'name' => 'Soon',
//            'text' => 'Скоро в продаже',
//        ]);
//
//        ProductStatus::create([
//            'name' => 'visible',
//            'text' => 'Видимый'
//        ]);
//
//        ProductStatus::create([
//            'name' => 'out_of_stock',
//            'text' => 'Распродано'
//        ]);
//
//        ProductStatus::create([
//            'name' => 'last',
//            'text' => '1 изделие',
//        ]);
    }
}
