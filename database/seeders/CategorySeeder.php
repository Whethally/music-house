<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Category::create([
            'name' => 'Гитара',
        ]);
        \App\Models\Category::create([
            'name' => 'Бас-гитара',
        ]);
        \App\Models\Category::create([
            'name' => 'Укулеле',
        ]);
        \App\Models\Category::create([
            'name' => 'Барабаны',
        ]);
        \App\Models\Category::create([
            'name' => 'Скрипка',
        ]);
        \App\Models\Category::create([
            'name' => 'Флейта',
        ]);
        \App\Models\Category::create([
            'name' => 'Саксофон',
        ]);
        \App\Models\Category::create([
            'name' => 'Клавишные',
        ]);
        \App\Models\Category::create([
            'name' => 'Виолончель',
        ]);
        \App\Models\Category::create([
            'name' => 'Аккордеон',
        ]);
        \App\Models\Category::create([
            'name' => 'Духовые',
        ]);
        \App\Models\Category::create([
            'name' => 'Другие',
        ]);
    }
}
