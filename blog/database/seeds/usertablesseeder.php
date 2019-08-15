<?php

use Illuminate\Database\Seeder;
use app\user;
class usertablesseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run ()
   
    {
        $User= \App\User::create([
            
          
            'name'=>'super',
            'username'=>'admin',
            'admin'=>('1'),
            'email'=>'hussein.upload@yaa',
            'password' =>bcrypt('123456'),



        ]);
        $User->attachRole('super_admin');

    }
}
