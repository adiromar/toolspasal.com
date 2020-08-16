<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->insert([
        	'username' => 'supplier',
        	'email' => 'supplier@gmail.com',
        	'password' => bcrypt('EncodersLab@2020'),
        ]);

        DB::table('role_user')->insert([
        		'user_id' => 2,
        		'role_id' => 2,
        ]);
    }
}
