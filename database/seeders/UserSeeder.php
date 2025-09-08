<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // ✅ You forgot this
use Illuminate\Support\Facades\Hash; // ✅ And this too

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Lumod',
            'email' => 'juliemaeee@example.com',
            'password' => Hash::make('manager123'),
            'role' => 'manager'
        ]);
    }
}
