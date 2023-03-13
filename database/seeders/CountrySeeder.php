<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Country::create([
            'name' => 'Россия',
        ]);
        \App\Models\Country::create([
            'name' => 'США',
        ]);
        \App\Models\Country::create([
            'name' => 'Китай',
        ]);
        \App\Models\Country::create([
            'name' => 'Япония',
        ]);
        \App\Models\Country::create([
            'name' => 'Германия',
        ]);
        \App\Models\Country::create([
            'name' => 'Франция',
        ]);
        \App\Models\Country::create([
            'name' => 'Великобритания',
        ]);
        \App\Models\Country::create([
            'name' => 'Италия',
        ]);
        \App\Models\Country::create([
            'name' => 'Испания',
        ]);
        \App\Models\Country::create([
            'name' => 'Канада',
        ]);
        \App\Models\Country::create([
            'name' => 'Южная Корея',
        ]);
        \App\Models\Country::create([
            'name' => 'Индия',
        ]);
        \App\Models\Country::create([
            'name' => 'Бразилия',
        ]);
        \App\Models\Country::create([
            'name' => 'Австралия',
        ]);
        \App\Models\Country::create([
            'name' => 'Мексика',
        ]);
        \App\Models\Country::create([
            'name' => 'Нидерланды',
        ]);
        \App\Models\Country::create([
            'name' => 'Швейцария',
        ]);
        \App\Models\Country::create([
            'name' => 'Швеция',
        ]);
        \App\Models\Country::create([
            'name' => 'Польша',
        ]);
        \App\Models\Country::create([
            'name' => 'Бельгия',
        ]);
        \App\Models\Country::create([
            'name' => 'Турция',
        ]);
        \App\Models\Country::create([
            'name' => 'Австрия',
        ]);
    }
}
