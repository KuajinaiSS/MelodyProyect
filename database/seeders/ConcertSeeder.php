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
                'concertName' => 'Chayanne',
                'price' => 40000,
                'stock' => 400,
                'availableStock' => 400,
                'date' => '2023-09-15'
            ],
            [
                'concertName' => 'Shakira',
                'price' => 50000,
                'stock' => 300,
                'availableStock' => 300,
                'date' => '2023-08-20'
            ],
            [
                'concertName' => 'Daddy Yankee',
                'price' => 20000,
                'stock' => 80,
                'availableStock' => 80,
                'date' => '2023-07-25'
            ],
            [
                'concertName' => 'Vitoko Cumple',
                'price' => 20000,
                'stock' => 70,
                'availableStock' => 70,
                'date' => '2023-07-18'
            ],
            [
                'concertName' => 'Diego Cumple',
                'price' => 18000,
                'stock' => 120,
                'availableStock' => 120,
                'date' => '2023-11-02'
            ],
            [
                'concertName' => 'Italo Cumple',
                'price' => 25000,
                'stock' => 90,
                'availableStock' => 90,
                'date' => '2023-06-10'
            ],
            [
                'concertName' => 'Elton John',
                'price' => 80000,
                'stock' => 60,
                'availableStock' => 60,
                'date' => '2023-06-02'
            ],
            [
                'concertName' => 'Bad Bunny',
                'price' => 30000,
                'stock' => 150,
                'availableStock' => 150,
                'date' => '2023-07-20'
            ],
            [
                'concertName' => 'Billie Eilish',
                'price' => 15000,
                'stock' => 110,
                'availableStock' => 110,
                'date' => '2023-07-25'
            ],
            [
                'concertName' => 'Lil Nas X',
                'price' => 22000,
                'stock' => 200,
                'availableStock' => 200,
                'date' => '2023-07-30'
            ],
        ];

        DB::table('concerts')->insert($concerts);
    }
}
