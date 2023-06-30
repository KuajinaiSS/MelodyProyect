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
                'concertName' => 'Concierto 1',
                'price' => 10,
                'stock' => 100,
                'date' => '2023-06-15',
                'availableStock' => 100
            ],
            [
                'concertName' => 'Concierto 2',
                'price' => 15,
                'stock' => 50,
                'date' => '2023-06-20',
                'availableStock' => 50
            ],
            [
                'concertName' => 'Concierto 3',
                'price' => 20,
                'stock' => 80,
                'date' => '2023-06-25',
                'availableStock' => 80
            ],
            [
                'concertName' => 'Concierto 4',
                'price' => 12,
                'stock' => 70,
                'date' => '2023-06-30',
                'availableStock' => 70
            ],
            [
                'concertName' => 'Concierto 5',
                'price' => 18,
                'stock' => 120,
                'date' => '2023-07-05',
                'availableStock' => 120
            ],
            [
                'concertName' => 'Concierto 6',
                'price' => 25,
                'stock' => 90,
                'date' => '2023-07-10',
                'availableStock' => 90
            ],
            [
                'concertName' => 'Concierto 7',
                'price' => 8,
                'stock' => 60,
                'date' => '2023-07-15',
                'availableStock' => 60
            ],
            [
                'concertName' => 'Concierto 8',
                'price' => 30,
                'stock' => 150,
                'date' => '2023-07-20',
                'availableStock' => 150
            ],
            [
                'concertName' => 'Concierto 9',
                'price' => 14,
                'stock' => 110,
                'date' => '2023-07-25',
                'availableStock' => 110
            ],
            [
                'concertName' => 'Concierto 10',
                'price' => 22,
                'stock' => 200,
                'date' => '2023-07-30',
                'availableStock' => 200
            ],
        ];

        DB::table('concerts')->insert($concerts);
    }
}
