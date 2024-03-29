<?php

namespace Database\Seeders;

use App\Models\Collection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Collection::create([
            'name' => 'Верхняя одежда',
            'text' => 'Верхняя одежда',
            'slug' => Str::slug('Верхняя одежда'),
        ]);

        Collection::create([
            'name' => 'Пиджаки',
            'text' => 'Пиджаки',
            'slug' => Str::slug('Пиджаки'),
        ]);

        Collection::create([
            'name' => 'Брюки, штаны',
            'text' => 'Брюки, штаны',
            'slug' => Str::slug('Брюки, штаны',),
        ]);

        Collection::create([
            'name' => 'Топы',
            'text' => 'Топы',
            'slug' => Str::slug('Топы'),

        ]);

        Collection::create([
            'name' => 'Платья',
            'text' => 'Платья',
            'slug' => Str::slug('Платья'),

        ]);

        Collection::create([
            'name' => 'Образы',
            'text' => 'Образы',
            'slug' => Str::slug('Образы'),

        ]);

        Collection::create([
            'name' => 'Все товары',
            'text' => 'Все товары',
            'slug' => Str::slug('Все товары'),

        ]);
    }
}
