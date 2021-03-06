<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'email' => 'admin@localhost',
            'name' => 'Administrator',
            'password' => Hash::make('admin'),
            'active' => true,
        ]);

        \App\User::create([
            'email' => 'alvaro@email',
            'name' => 'Alvaro',
            'password' => Hash::make('alvaro'),
            'active' => true,
        ]);
        
    }
}
