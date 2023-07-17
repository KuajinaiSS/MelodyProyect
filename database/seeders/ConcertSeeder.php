<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConcertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $concerts = [
            [
                'concert_name' => 'Chayanne',
                'price' => 40000,
                'stock' => 400,
                'available_stock' => 400,
                'date' => '2023-09-15'
            ],
            [
                'concert_name' => 'Shakira',
                'price' => 50000,
                'stock' => 300,
                'available_stock' => 300,
                'date' => '2023-08-20'
            ],
            [
                'concert_name' => 'Daddy Yankee',
                'price' => 20000,
                'stock' => 80,
                'available_stock' => 80,
                'date' => '2023-07-25'
            ],
            [
                'concert_name' => 'Vitoko Cumple',
                'price' => 20000,
                'stock' => 70,
                'available_stock' => 70,
                'date' => '2023-07-18'
            ],
            [
                'concert_name' => 'Diego Cumple',
                'price' => 18000,
                'stock' => 120,
                'available_stock' => 120,
                'date' => '2023-11-02'
            ],
            [
                'concert_name' => 'Italo Cumple',
                'price' => 25000,
                'stock' => 90,
                'available_stock' => 90,
                'date' => '2023-06-10'
            ],
            [
                'concert_name' => 'Elton John',
                'price' => 80000,
                'stock' => 60,
                'available_stock' => 60,
                'date' => '2023-06-02'
            ],
            [
                'concert_name' => 'Bad Bunny',
                'price' => 30000,
                'stock' => 150,
                'available_stock' => 150,
                'date' => '2023-07-20'
            ],
            [
                'concert_name' => 'Billie Eilish',
                'price' => 15000,
                'stock' => 110,
                'available_stock' => 110,
                'date' => '2023-07-25'
            ],
            [
                'concert_name' => 'Lil Nas X',
                'price' => 22000,
                'stock' => 200,
                'available_stock' => 200,
                'date' => '2023-07-30'
            ],
        ];

        DB::table('concerts')->insert($concerts);
    }
}
