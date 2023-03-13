<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Product::create([
            'name' => 'Гитара Fender Stratocaster',
            'description' => 'Гитара Fender Stratocaster',
            'price' => rand(13337, 999999),
            'quantity' => 10,
            'category_id' => 1,
            'country_id' => 1,
            'status_id' => 1,
            'image' => '1.jpeg'
        ]);
        \App\Models\Product::create([
            'name' => 'Бас-гитара Fender Jazz Bass',
            'description' => 'Бас-гитара Fender Jazz Bass',
            'price' => rand(13337, 999999),
            'quantity' => 10,
            'category_id' => 2,
            'country_id' => 1,
            'status_id' => 1,
            'image' => '2.jpeg'
        ]);
        \App\Models\Product::create([
            'name' => 'Укулеле Fender Concert',
            'description' => 'Укулеле Fender Concert',
            'price' => rand(13337, 999999),
            'quantity' => 10,
            'category_id' => 3,
            'country_id' => 1,
            'status_id' => 1,
            'image' => '5.jpeg'
        ]);
        \App\Models\Product::create([
            'name' => 'Скрипка Stradivarius',
            'description' => 'Скрипка Stradivarius',
            'price' => rand(13337, 999999),
            'quantity' => 10,
            'category_id' => 5,
            'country_id' => 3,
            'status_id' => 1,
            'image' => '6.jpeg'
        ]);
        \App\Models\Product::create([
            'name' => 'Пианино Yamaha',
            'description' => 'Пианино Yamaha',
            'price' => rand(13337, 999999),
            'quantity' => 10,
            'category_id' => 4,
            'country_id' => 2,
            'status_id' => 1,
            'image' => '10.jpeg'
        ]);
    }
}
