<?php

use Illuminate\Database\Seeder;

class normaluser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->insert([
        	'username' => 'customer',
        	'email' => 'customer@gmail.com',
        	'password' => bcrypt('EncodersLab@2020'),
        ]);

        DB::table('role_user')->insert([
        		'user_id' => 3,
        		'role_id' => 3,
        ]);
    }
}
