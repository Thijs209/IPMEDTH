<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EvaluationNoteTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('evaluation_note_types')->insert([
            'note_type' => "core quadrants",
        ]);
        DB::table('evaluation_note_types')->insert([
            'note_type' => "tasks",
        ]);
        DB::table('evaluation_note_types')->insert([
            'note_type' => "goals",
        ]);
    }
}
