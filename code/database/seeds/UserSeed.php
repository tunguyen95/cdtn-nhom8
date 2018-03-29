<?php

use Illuminate\Database\Seeder;


class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert( 
       		['name' => 'Bố là Admin', 'email'=>'admin@gmail.com', 'password'=> Hash::make(123456), 'phone'=>'012345678', 'address'=> "Hà Nội", 'status'=>'0', "avatar" =>"avatar.png"]
       );
    }
}
