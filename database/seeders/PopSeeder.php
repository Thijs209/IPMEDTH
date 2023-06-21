<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
            'evaluated_by' => 2,
            'user_finished' => true,
            'user_finished_at' => Carbon::now()->sub(40, 'day'),
            'evaluation_finished' => true,
            'evaluation_finished_at' => carbon::now()->sub(30, 'day'),
            'created_at' => Carbon::now()->sub(60, 'day'),
        ]);

        DB::table('pops')->insert([
            'id' => 1110,
            'user_id' => 4,
            'evaluated_by' => 2,
            'user_finished' => false,
            'user_finished_at' => null,
            'evaluation_finished' => false,
            'evaluation_finished_at' => null,
            'created_at' => Carbon::now()->sub(20, 'day'),
        ]);

        DB::table('pops')->insert([
            'id' => 1111,
            'user_id' => 4,
            'evaluated_by' => 2,
            'user_finished' => false,
            'user_finished_at' => null,
            'evaluation_finished' => false,
            'evaluation_finished_at' => null,
            'created_at' => Carbon::now()->sub(20, 'day'),

        ]);
    }
}