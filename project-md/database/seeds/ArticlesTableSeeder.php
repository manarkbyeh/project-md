<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //


        DB::table('articles')->delete();

        DB::table('articles')->insert(array(


            array('title'=>'wortel',
                'text'=>'Ik heb 5 wortels en kan ze niet meer op krijgen',
                'datum'=>'2017-10-25',
                'locatie'=>'Antwerpen',
                'pic'=>'wortel.jpg',
                'tijdstip'=>'14:00 - 17:00',
                'user_id'=>'1'),
            array('title'=>'zoeteaardappelen',
                'text'=>'Deze aardappelen vorige week aangekocht, maar kan er niks meer mee doen',
                'datum'=>'2017-10-24',
                'locatie'=>'Deurne',
                'pic'=>'zoeteaardappel.jpg',
                'tijdstip'=>'17:00 - 19:00',
                'user_id'=>'2'),
            array('title'=>'Advocados',
                'text'=>'Gekocht om te proeven, maar vind ze toch niet lekker.',
                'datum'=>'2017-10-24',
                'locatie'=>'Herentals',
                'pic'=>'avocado.jpg',
                'tijdstip'=>'19:00 - 20:00',
                'user_id'=>'3')

        ));

    }
}
