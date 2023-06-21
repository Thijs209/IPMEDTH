<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PopSeeder extends Seeder
{
    protected $table = 'pops';
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('pops')->insert([
            'id' => 1109,
            'user_id' => 5,
            'evaluated_by' => null,
            'user_finished' => false,
            'user_finished_at' => null,
            'evaluation_finished' => false,
            'evaluation_finished_at' => null,
        ]);

        DB::table('pops')->insert([
            'id' => 1110,
            'user_id' => 4,
            'evaluated_by' => null,
            'user_finished' => false,
            'user_finished_at' => null,
            'evaluation_finished' => false,
            'evaluation_finished_at' => null,
        ]);

        DB::table('pops')->insert([
            'id' => 1111,
            'user_id' => 4,
            'evaluated_by' => null,
            'user_finished' => false,
            'user_finished_at' => null,
            'evaluation_finished' => false,
            'evaluation_finished_at' => null,
        ]);
    }
}
