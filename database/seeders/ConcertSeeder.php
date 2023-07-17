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
                'stock' => 250,
                'available_stock' => 250,
                'date' => '2023-07-25'
            ],
            [
                'concert_name' => 'Vitoko Cumple',
                'price' => 20000,
                'stock' => 270,
                'available_stock' => 270,
                'date' => '2023-07-18'
            ],
            [
                'concert_name' => 'Diego Cumple',
                'price' => 18000,
                'stock' => 160,
                'available_stock' => 160,
                'date' => '2023-11-02'
            ],
            [
                'concert_name' => 'Italo Cumple',
                'price' => 25000,
                'stock' => 190,
                'available_stock' => 190,
                'date' => '2023-06-10'
            ],
            [
                'concert_name' => 'Elton John',
                'price' => 80000,
                'stock' => 260,
                'available_stock' => 260,
                'date' => '2023-06-02'
            ],
            [
                'concert_name' => 'Bad Bunny',
                'price' => 30000,
                'stock' => 350,
                'available_stock' => 350,
                'date' => '2023-07-20'
            ],
            [
                'concert_name' => 'Billie Eilish',
                'price' => 15000,
                'stock' => 210,
                'available_stock' => 210,
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
