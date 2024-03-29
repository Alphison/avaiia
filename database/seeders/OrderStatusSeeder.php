<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrderStatus::create([
            'name' => 'Оформлен',
            'text' => 'Оформлен',
            'text_en' => 'Decorated'
        ]);

        OrderStatus::create([
            'name' => 'Собирается',
            'text' => 'Cобирается',
            'text_en' => 'Going to'
        ]);

        OrderStatus::create([
            'name' => 'Передан в доставку',
            'text' => 'Передан в доставку',
            'text_en' => 'Sent for delivery'
        ]);
        OrderStatus::create([
            'name' => 'Доставлен',
            'text' => 'Доставлен',
            'text_en' => 'Delivered'
        ]);

        OrderStatus::create([
            'name' => 'Отменен',
            'text' => 'Отменен',
            'text_en' => 'Cancelled'
        ]);
    }
}
