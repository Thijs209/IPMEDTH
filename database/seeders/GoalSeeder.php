<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GoalSeeder extends Seeder
{

    protected $table = 'goals';
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $goal_types = [
            "persoonlijk" => 1,
            "professioneel" => 2,
            "organisatie" => 3,
            "training" => 4,
            "functie" => 5,
            "gezondheid" => 6,
        ];

        DB::table('goals')->insert([
            'id' => 11091,
            'pop_id' => 1109,
            'goal_type_id' => '1',
            'what' => 'Ik wil meer tijd besteden aan mijn hobby\'s door 1x per week een avond vrij te houden',
            'why' => 'Ik wil meer tijd besteden aan mijn hobby\'s omdat ik daar energie van krijg',
            'satisfied' => 'Ik ben tevreden wanneer ik een nieuwe miniatuur heb af kunnen maken in deze POP-cyclus.',
            'deadline' => null,
            'feedback' =>  'Ik heb hier geen feedback bij nodig van anderen.'
        ]);

        // Maak lege goals aan voor de overige goal types
        for ($i = 2; $i < 5; $i++) {
            DB::table('goals')->insert([
                'id' => (11090 + $i),
                'pop_id' => 1109,
                'goal_type_id' => $i,
            ]);
        }

        /* Karin Tonneman - POP 1 -  */

        DB::table('goals')->insert([
            'id' => 11101,
            'pop_id' => 1110,
            'goal_type_id' => '1',
            'what' => 'Ik wil mijn werkplek opgeruimd houden door elke dag 10 minuten te besteden aan het opruimen van mijn bureau.',
            'why' => 'Ik wil mijn werkplek opgeruimd houden omdat ik daar rustig van word.',
            'satisfied' => 'Ik ben tevreden wanneer ik mijn bureau aan het einde van de dag opgeruimd achterlaat.',
            'deadline' => null,
            'feedback' =>  'Ik heb hier geen feedback bij nodig van anderen.'
        ]);

        DB::table('goals')->insert([
            'id' => 11102,
            'pop_id' => 1110,
            'goal_type_id' => '2',
            'what' => 'Ik wil kortere mails kunnen sturen.',
            'why' => 'Ik wil kortere mails kunnen sturen omdat ik geloof dat, dat professioneel overkomt.',
            'satisfied' => 'Ik ben tevreden wanneer ik bij de kernboodschap kan blijven in een mail.',
            'deadline' => null,
            'feedback' =>  'Ik zou graag feedback willen van mijn projectleider, welke vaak in de CC\'s staat.'
        ]);

        // Maak lege goals aan voor de overige goal types
        for ($i = 3; $i <= 6; $i++) {
            DB::table('goals')->insert([
                'id' => (11100 + $i),
                'pop_id' => 1110,
                'goal_type_id' => $i,
            ]);
        }

        DB::table('goals')->insert([
            'id' => 11111,
            'pop_id' => 1111,
            'goal_type_id' => $goal_types["gezondheid"],
            'what' => "Ik wil graag meer overzicht creëren in mijn werkzaamheden.",
            'why' => "Wanneer ik meer overzicht heb, kan ik mijn werkzaamheden beter en prioriteren.",
            'satisfied' =>
            "Ik ben tevreden wanneer ik in het komende project minder stress ervaar.",
            'support' =>
            "Ik heb ondersteuning nodig van mijn manager, Vera PM, om mij te helpen met het stellen van prioriteiten.",
            // deadline: moment().format("Y-M-D"),
            'deadline' => null,
            'feedback' => "Ik wens feedback van mijn behandelaar te ontvangen over mijn voortgang.",
        ]);

        DB::table('goals')->insert([
            'id' => 11112,
            'pop_id' => 1111,
            'goal_type_id' =>  $goal_types["persoonlijk"],
            'what' => "Ik wil graag meer doen aan mijn hobby's buiten werk.",
            'why' => "Wanneer ik meer tijd besteed aan mijn hobby's, kan ik mijn werk beter loslaten.",
            'satisfied' =>
            "Ik ben tevreden wanneer ik in het komende project elk weekend gemiddeld 2 uur per maand aan mijn hobby (boogschieten) heb besteed.",
            'support' =>
            "Ik heb ondersteuning nodig van mijn partner, Lou, om mij te helpen met het stellen van prioriteiten. Ik zou graag 's avonds tijd over willen houden om tot rust te komen voor het weekend.",
            'deadline' => null,
            'feedback' => "Ik wens feedback van mijn trainingspartner te ontvangen over mijn voortgang. Ik denk dat het tot rust komen voor het weekend mij zal helpen om beter te present te zijn tijdens het boogschieten.",
        ]);

        DB::table('goals')->insert([
            'id' => 11113,
            'pop_id' => 1111,
            'goal_type_id' => $goal_types["organisatie"],
            'what' => "Ik wil bijdragen aan het verbeteren van de werksfeer.",
            'why' => "Wanneer ik bijdraag aan het verbeteren van de werksfeer, kan ik beter samenwerken met mijn collega's.",
            'satisfied' =>
            "Ik ben tevreden wanneer ik in het komende project 1 keer per week een compliment geef aan een collega.",
            'support' =>
            "Ik zou graag ondersteuning van mijn teamleden willen ontvangen tijdens dit proces.",
            'deadline' => null,
            'feedback' => "Ik wens feedback van mijn manager (Vera PM) te ontvangen na afloop van de POP cyclus.",
        ]);

        DB::table('goals')->insert([
            'id' => 11114,
            'pop_id' => 1111,
            'goal_type_id' => $goal_types["training"],
            'what' => "Ik wil graag mijn communicatievaardigheden verbeteren.",
            'why' => "Wanneer ik mijn communicatievaardigheden verbeter, kan ik beter samenwerken met mijn collega's.",
            'satisfied' =>
            "Ik ben tevreden wanneer ik in het komende project 1 keer per week een compliment geef aan een collega.",
            'support' =>
            "Ik zou graag ondersteuning van mijn directe projectleden willen ontvangen. .",
            'deadline' => null,
            'feedback' => "Ik wens feedback van mijn directe collega's (Vera PM) te ontvangen na afloop van het komende project.",
        ]);

        DB::table('goals')->insert([
            'id' => 11115,
            'pop_id' => 1111,
            'goal_type_id' =>  $goal_types["functie"],
            // 'what' => '',
            // 'why' => '',
            // 'satisfied' => '',
            // 'support' => '',
            // 'deadline' => null,
            // 'feedback' => '',
        ]);

        DB::table('goals')->insert([
            'id' => 11116,
            'pop_id' => 1111,
            'goal_type_id' =>  $goal_types["professioneel"],
            // 'what' => '',
            // 'why' => '',
            // 'satisfied' => '',
            // 'support' => '',
            // 'deadline' => null,
            // 'feedback' => '',
        ]);
    }
}
