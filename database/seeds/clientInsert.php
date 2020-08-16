<?php

use Illuminate\Database\Seeder;

class clientInsert extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->insert([
        	'username' => 'Pathivara',
        	'email' => 'pathivarahardware2065@gmail.com',
        	'password' => bcrypt('pathivara2065'),
        ]);

        DB::table('role_user')->insert([
        		'user_id' => 18,
        		'role_id' => 2,
        ]);
    }
}
