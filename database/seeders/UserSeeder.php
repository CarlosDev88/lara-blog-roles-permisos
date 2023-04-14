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
            'name' => 'Carlos Rueda',
            'email' => 'carlos@gmail.com',
            'password' => bcrypt('123456789')

        ])->assignRole('Admin');

        User::factory(10)->create();
    }
}
