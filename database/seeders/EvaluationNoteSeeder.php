<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EvaluationNoteSeeder extends Seeder
{

    protected $table = 'evaluation_notes';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('evaluation_notes')->insert([
            'pop_id' => 1109,
            'evaluation_note' => 'Karin is net begonnen, mogelijk is het handig om haar nog wat meer tijd te geven om te wennen aan de nieuwe omgeving.',
            'created_at' => Carbon::now()->sub(1, 'month'),
            'updated_at' => Carbon::now()->sub(1, 'month'),
        ]);

        DB::table('evaluation_notes')->insert([
            'pop_id' => 1110,
            'evaluation_note_type_id' => 1,
            'evaluation_note' => 'Karin is net begonnen, mogelijk is het handig om haar nog wat meer tijd te geven om te wennen aan de nieuwe omgeving.',
            'created_at' => Carbon::now()->sub(1, 'month'),
            'updated_at' => Carbon::now()->sub(1, 'month'),
        ]);
        DB::table('evaluation_notes')->insert([
            'pop_id' => 1111,
            'evaluation_note_type_id' => 1,
            'evaluation_note' => 'Karin is net begonnen, mogelijk is het handig om haar nog wat meer tijd te geven om te wennen aan de nieuwe omgeving.',
            'created_at' => Carbon::now()->sub(14, 'days'),
            'updated_at' => Carbon::now()->sub(14, 'days'),
        ]);
    }
}
