<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class GoalTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('goal_types')->insert([
            'type'=> "persoonlijk",
        ]);

        DB::table('goal_types')->insert([
            'type'=> "professioneel",
        ]);
        DB::table('goal_types')->insert([
            'type'=> "organisatie",
        ]);
        DB::table('goal_types')->insert([
            'type'=> "training",
        ]);
    }
}
