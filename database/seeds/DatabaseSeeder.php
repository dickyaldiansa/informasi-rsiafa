<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->truncate();
        DB::table('users')->insert([
            'name'      => 'Admin',
            'email'     => 'admin@gmail.com',
            'username'  => 'admin',
            'password'  => bcrypt('admin'),
        ]);
    }
}
