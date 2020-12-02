<?php

use Illuminate\Database\Seeder;

class EditableContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //welcome page
        \DB::table('page_sections')->insert([
            'page' => 'welcome',
            'section' => 'top-left',
            'title' => 'Wat doen we?',
            'content' => 'Het dagelijks verstrekken van een voedzaam ontbijt aan iedere Nederlandse scholier indien de ouders daartoe financieel niet in staat zijn. Het Nationaal Jeugd Ontbijt is een initiatief van drie betrokken Bosschenaren.',
            'role_id' => 1,
            'unit_id' => 0,
            'background_color' => '#ffffff',
        ]);

        \DB::table('page_sections')->insert([
            'page' => 'welcome',
            'section' => 'top-middle',
            'title' => 'Verschillen',
            'content' => 'Het Nationaal School Ontbijt voert één keer per jaar gedurende één week een campagne om aandacht te vragen voor het belang van een dagelijks ontbijt. Het Nationaal Jeugd Ontbijt levert iedere week gratis in een gekoelde box zeven voedzame ontbijten af bij de deelnemende scholieren thuis. ',
            'role_id' => 1,
            'unit_id' => 0,
            'background_color' => '#ffffff',
        ]);

        \DB::table('page_sections')->insert([
            'page' => 'welcome',
            'section' => 'top-right',
            'title' => 'Aanleiding',
            'content' => 'Uit onderzoek blijkt dat er binnen het Basis- en Middelbaar Onderwijs gemiddeld zes scholieren per klas naar school gaan zonder ontbijt; omdat hun ouders dat niet kunnen betalen. Zelfs de Voedselbank vult dat tekort niet aan. Uit onderzoek blijkt dat armoede meestal van generatie op generatie overgaat. Men zit als het ware gevangen in een Onheilsspiraal die niet te doorbreken lijkt.',
            'role_id' => 1,
            'unit_id' => 0,
            'background_color' => '#ffffff',
        ]);

        DB::table('page_sections')->insert([
            'page' => 'welcome',
            'section' => 'bottom-left',
            'title' => 'Deelnemende units',
            'content' => 'Van alle 390 units doen er nu 45 mee aan het nationaal jeugdontbijt!',
            'role_id' => 1,
            'unit_id' => 0,
        ]);
        DB::table('page_sections')->insert([
            'page' => 'welcome',
            'section' => 'bottom-middle',
            'title' => 'Deelnemende scholen',
            'content' => 'Er doen nu veel scholen mee! iedere school is welkom bij ons dus zoek contact op als u interesse heeft!',
            'role_id' => 1,
            'unit_id' => 0,
        ]);
        DB::table('page_sections')->insert([
            'page' => 'welcome',
            'section' => 'bottom-right',
            'title' => 'resultaten van kinderen',
            'content' => 'Van vrijwel alle kinderen zijn de schoolresultaten aanzienlijk verbeterd dankzij het deelnemen aan het nationaal jeugdontbijt',
            'role_id' => 1,
            'unit_id' => 0,
        ]);
        //sponsors page

        DB::table('page_sections')->insert([
            'page' => 'sponsors',
            'section' => 'top',
            'title' => 'Ook sponsor worden?',
            'content' => 'Spreekt het u aan om sponsor te worden? Neem dan contact met ons op via het contactformulier.',
            'role_id' => 1,
            'unit_id' => 0,
        ]);
        //children page
        DB::table('page_sections')->insert([
            'page' => 'children',
            'section' => 'top',
            'title' => '',
            'content' => 'Ontbijten is heel belangrijk',
            'role_id' => 1,
            'unit_id' => 0,
            'background_color' => '#afd9ee',
        ]);

        DB::table('page_sections')->insert([
            'page' => 'children',
            'section' => 'middle',
            'title' => '',
            'content' => 'ontbijten is goed voor je schoolresultaten',
            'role_id' => 1,
            'unit_id' => 0,
            'background_color' => '#ebccd1',
        ]);

        DB::table('page_sections')->insert([
            'page' => 'children',
            'section' => 'bottom',
            'title' => '',
            'content' => 'Je kunt het beste gevarieerd ontbijten',
            'role_id' => 1,
            'unit_id' => 0,
            'background_color' => '#9fd499',
        ]);
    }
}
