<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Ítalo Donoso Barraza',
            'email' => 'italo.donoso@ucn.cl',
            'password' => bcrypt('Melody91'),
            'role' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'Diego',
            'email' => 'diego.correo@gmail.com',
            'password' => bcrypt('Diego123'),
            'role' => 0
        ]);

        DB::table('users')->insert([
            'name' => 'Dummy1',
            'email' => 'Dummy1@gmail.com',
            'password' => bcrypt('dummy12345'),
            'role' => 0
        ]);

        DB::table('users')->insert([
            'name' => 'Dummy2',
            'email' => 'Dummy2@gmail.com',
            'password' => bcrypt('dummy12345'),
            'role' => 0
        ]);

        DB::table('users')->insert([
            'name' => 'Dummy3',
            'email' => 'Dummy4@gmail.com',
            'password' => bcrypt('dummy12345'),
            'role' => 0
        ]);


    }
}
