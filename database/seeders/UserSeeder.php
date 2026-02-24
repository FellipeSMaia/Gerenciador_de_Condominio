<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'fellipe@teste.com'],
            ['name' => 'Fellipe', 'email' => 'fellipe@teste.com', 'password' => ('123456')]
        );
         User::firstOrCreate(
            ['email' => 'pedro@teste.com'],
            ['name' => 'Pedro', 'email' => 'pedro@teste.com', 'password' => ('123456')]
        );
         User::firstOrCreate(
            ['email' => 'matheus@teste.com'],
            ['name' => 'Matheus', 'email' => 'matheus@teste.com', 'password' => ('123456')]
        );
         User::firstOrCreate(
            ['email' => 'ana@teste.com'],
            ['name' => 'Ana', 'email' => 'ana@teste.com', 'password' => ('123456')]
        );
    }
}
