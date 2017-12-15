<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        factory(\App\User::class)->create([
            'name' => 'Eduardo Ortega',
            'email' => 'ortegon000@hotmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
