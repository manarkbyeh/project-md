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
        $this->call(UsersTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);


        DB::table('categories')->delete();
        //insert some dummy records
        DB::table('categories')->insert(array(
            array('name'=>'groenten','pic'=>'groenten.png'),
            array('name'=>'vlees','pic'=>'vlees.png'),
            array('name'=>'fruit','pic'=>'fruit.png'),
            array('name'=>'snacks','pic'=>'snacks.png'),
            array('name'=>'drinken','pic'=>'drinken.png')

        ));
    }
}
