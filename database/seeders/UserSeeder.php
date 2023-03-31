<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=> 'Andres',
            'email' => 'andres@gmail.com',
            'password' =>bcrypt('1234')
        ])->assignRole('Admin');

        User::create([
            'name'=> 'almario',
            'email' => 'andresfelipealmario2309@gmail.com',
            'password' =>bcrypt('123')
        ])->assignRole('Admin');

        User::create([
            'name'=> 'navarro',
            'email' => 'andresfelipe@gmail.com',
            'password' =>bcrypt('123')
        ])->assignRole('User');

        User::factory(99)->create();
    }
}
