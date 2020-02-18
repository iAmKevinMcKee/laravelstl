<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'email' => 'admin@email.com',
            'name' => 'Admin User',
            'role' => 'admin',
            'password' => bcrypt('password'),
        ]);
    }
}
