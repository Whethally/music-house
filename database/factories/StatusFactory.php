<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Status>
 */
class StatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    const STATUSES = [
        'В обработке',
        'Отправлен',
        'Доставлен',
        'Отменен',
    ];
    public function definition()
    {
        return [
            'name' => self::STATUSES[$this->faker->numberBetween(0, 3)],
        ];
    }
}
