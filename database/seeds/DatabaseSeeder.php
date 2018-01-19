<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\User::create([
            'email' => 'admin@lawma.ug',
            'password' => bcrypt('havatech@123'),
                    ]);
        // $this->call(UsersTableSeeder::class);
    }
}
