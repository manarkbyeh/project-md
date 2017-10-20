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

        DB::table('users')->delete();

        DB::table('users')->insert(array(


            array('name'=>'andreea','email'=>'andreea.penu@student.kdg.be','password'=>bcrypt('secret')),
            array('name'=>'andreea2','email'=>'andreea_penu@hotmail.com','password'=>bcrypt('secret')),
            array('name'=>'manar','email'=>'manar.kbyeh@student.kdg.be','password'=>bcrypt('secret'))

        ));
    }
}
