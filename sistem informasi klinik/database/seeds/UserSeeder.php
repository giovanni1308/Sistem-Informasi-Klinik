<?php

use Illuminate\Database\Seeder;
use App\User;

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
            'name' => 'Admin',
            'role' => 'admin',
            'email' => 'adminklinik@gmail.com',
            'password' => bcrypt('rahasia'),
        ]);
    }
}
