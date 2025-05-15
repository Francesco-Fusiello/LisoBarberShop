<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    
    User::create([
    'name' => 'Admin1',
    'email' => 'ffusiello22@gmail.com',
    'password' => Hash::make('P0o9i8u7-'),
    ]);
    
}
}
