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
            'email' => 'kevin@intellow.com',
            'name' => 'Kevin McKee',
            'password' => bcrypt('password'),
        ]);
    }
}
