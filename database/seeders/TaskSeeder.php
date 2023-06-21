<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tasks')->insert([
            // Tom Mann - POP - 1
            'pop_id' => 1109,
            'goal' => "Mijn doel is om meer .",
            'results' => "Wanneer ik meer overzicht heb, kan ik mijn werkzaamheden beter plannen en prioriteren.",
            'success' => "Ik heb dit doel bereikt wanneer ik in het komende project minder stress ervaar.",
            'manager' => "Mijn manager, Vera PM, kan mij helpen door mij te helpen met het stellen van prioriteiten.",
            'report_others' => "Ik rapporteer enkel aan Vera PM voor mijn werkzaamheden.",
        ]);

        DB::table('tasks')->insert([
            // Karin Tonneman - POP - 1
            'pop_id' => 1110,
            'goal' => "Mijn doel is om meer werk uit handen te kunnen geven.",
            'results' => "Ik vind het lastig om iets aan een ander door te spelen, ook wanneer gepast. Ik wil dit graag veranderen.",
            'success' => "Ik heb dit doel bereikt wanneer ik wekelijks minimaal 1 ding aan de juiste afdeling doorspeel wat ik normaal zelf op zou pakken.",
            'manager' => "Mijn manager, Vera PM, kan mij helpen door mij te helpen met het stellen van prioriteiten.",
            'report_others' => "Ik rapporteer enkel aan Vera PM voor mijn werkzaamheden.",
        ]);

        DB::table('tasks')->insert([
            // Karin Tonneman - POP - 2
            'pop_id' => 1111,
            'goal' => "Mijn overkoepelende doel is om meer overzicht te creëren in mijn werkzaamheden.",
            'results' => "Wanneer ik meer overzicht heb, kan ik mijn werkzaamheden beter plannen en prioriteren.",
            'success' => "Ik heb dit doel bereikt wanneer ik in het komende project minder stress ervaar.",
            'manager' => "Mijn manager, Vera PM, kan mij helpen door mij te helpen met het stellen van prioriteiten.",
            'report_others' => "Ik rapporteer enkel aan Vera PM voor mijn werkzaamheden.",
        ]);
    }
}
