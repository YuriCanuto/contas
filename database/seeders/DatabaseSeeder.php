<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'nome' => 'Yuna Canuto',
            'email' => 'yuna@mail.com',
            'password' => bcrypt('123123123')
        ]);

        User::factory()->create([
            'nome' => 'Yuri Canuto',
            'email' => 'yuriasc@gmail.com',
            'password' => bcrypt('123123123')
        ]);

        User::factory()->create([
            'nome' => 'Yasmim Canuto',
            'email' => 'yasmim@mail.com',
            'password' => bcrypt('123123123')
        ]);

        User::factory()->create([
            'nome' => 'Antônio Canuto',
            'email' => 'antonio@mail.com',
            'password' => bcrypt('123123123')
        ]);

        User::factory()->create([
            'nome' => 'Elizete',
            'email' => 'elizete@mail.com',
            'password' => bcrypt('123123123')
        ]);
    }
}
