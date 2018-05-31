<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'first_name' => str_random(10),
            'last_name' => str_random(10),
            'position' => str_random(10),
            'email' => 'admin@admin.com',
            'username' => str_random(10),
            'password' => bcrypt('password'),
            'active' => 'y',
        ]);
    }
}
