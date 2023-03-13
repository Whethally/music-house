<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Status::create([
            'name' => 'В обработке',
        ]);
        \App\Models\Status::create([
            'name' => 'Отправлен',
        ]);
        \App\Models\Status::create([
            'name' => 'Доставлен',
        ]);
        \App\Models\Status::create([
            'name' => 'Отменен',
        ]);
    }
}
