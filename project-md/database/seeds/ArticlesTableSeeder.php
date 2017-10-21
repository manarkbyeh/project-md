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


            array('title'=>'Verse komkommer',
                'text'=>'Ik heb 5 komkommers en kan ze niet meer op krijgen',
                'datum'=>'2017-10-25',
                'pic'=>'komkommer.jpg',
                'tijdstip'=>'14:00 - 17:00',
                'user_id'=>'1'),
            array('title'=>'3 Tomaten',
                    'text'=>'Deze tomaten vorige week aangekocht, maar kan er niks meer mee doen',
                    'datum'=>'2017-10-24',
                    'pic'=>'tomaat.jpg',
                    'tijdstip'=>'17:00 - 19:00',
                    'user_id'=>'2'),
            array('title'=>'Advocados',
                        'text'=>'Gekocht om te proeven, maar vind ze toch niet lekker.',
                        'datum'=>'2017-10-24',
                        'pic'=>'avocado.jpg',
                        'tijdstip'=>'19:00 - 20:00',
                        'user_id'=>'3')

        ));

    }
}
