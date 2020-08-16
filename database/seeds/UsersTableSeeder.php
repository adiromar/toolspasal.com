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
        $user = DB::table('users')->insert([
        	'username' => 'Encoderslab',
        	'email' => 'encoderslab@gmail.com',
        	'password' => bcrypt('EncodersLab@2020'),
        ]);

        DB::table('role_user')->insert([
        		'user_id' => 1,
        		'role_id' => 1,
        ]);
    }
}
