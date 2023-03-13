<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    const IMAGES = [
        '1.jpeg',
        '2.jpeg',
        '3.jpeg',
        '4.jpeg',
        '5.jpeg',
        '6.jpeg',
        '7.jpeg',
        '8.jpeg',
        '9.jpeg',
        '10.jpeg',
        '11.jpeg',
        '12.jpeg',
        '13.jpeg',
        '14.jpeg',
        '15.jpeg',
        '16.jpeg',
        '17.jpeg',
        '18.jpeg',
        '19.jpeg',
    ];
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'price' => $this->faker->randomFloat(2, 0, 1000),
            'description' => $this->faker->text,
            'category_id' => $this->faker->numberBetween(1, 12),
            'country_id' => $this->faker->numberBetween(1, 10),
            'image' => self::IMAGES[$this->faker->numberBetween(0, 18)],
        ];
    }
}
