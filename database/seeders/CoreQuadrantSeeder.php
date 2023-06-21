<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoreQuadrantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('core_quadrants')->insert([
            // Tom Mann - POP - 1
            'pop_id' => 1109,
            'core_quality' => 'Sociaal sterk',
            'pitfall' => 'Te veel aandacht voor anderen',
            'allergy' => 'Asociaal gedrag',
            'challenge' => 'Dingen niet personlijk opvatten',
        ]);

        DB::table('core_quadrants')->insert([
            // Karin Tonneman - 1
            'pop_id' => 1110,
            'core_quality' => 'Oog voor detail',
            'pitfall' => 'Deadlines missen',
            'allergy' => 'Slordig werk',
            'challenge' => 'Overzicht behouden',
        ]);

        DB::table('core_quadrants')->insert([
            // Karin Tonneman - 2
            'pop_id' => 1111,
            'core_quality' => 'Ik ben een harde werker.',
            'pitfall' => 'Ik ben een perfectionist.',
            'allergy' => 'Ik kan niet tegen onduidelijkheid.',
            'challenge' => 'Ik wil graag alles zelf doen.',
        ]);
    }
}
