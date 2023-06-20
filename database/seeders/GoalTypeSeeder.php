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
        $goal_types = [
            "persoonlijk",
            "professioneel",
            "organisatie",
            "training",
            "functie",
            "gezondheid",
        ];

        foreach ($goal_types as $goal => $type) {
            DB::table('goal_types')->insert([
                'type' => $type,
            ]);
        }; 
    }
};