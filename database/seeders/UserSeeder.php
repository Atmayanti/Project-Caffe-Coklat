<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ferdy Hahan Pradana',
            'email' => 'ferdyhahan2@gmail.com',
            'level' => 'admin',
            'password' => bcrypt('password')
        ]);
        User::create([
            'name' => 'Suyatno',
            'email' => 'suyatno@gmail.com',
            'level' => 'user',
            'password' => bcrypt('password')
        ]);
    }
}
