<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ManagerSeeder extends Seeder
{
 /**
     * Run the database seeds.
     */
   public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'manager@example.com'],
            [
                'name' => 'Julie Mae Lumod',
                'email' => 'manager@example.com',
                'password' => Hash::make('password123'),
                'role' => 'Manager',
            ]
        );
    }
}
    
