<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    const CATEGORIES = [
        'Гитара',
        'Бас-гитара',
        'Укулеле',
        'Барабаны',
        'Скрипка',
        'Флейта',
        'Саксофон',
        'Клавишные',
        'Виолончель',
        'Аккордеон',
        'Духовые',
        'Другие',
    ];

    public function definition()
    {
        return [
            'name' => self::CATEGORIES,
        ];
    }
}
