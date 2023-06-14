<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class PopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
     DB::table('pops')->insert([
            'user_id' => 4,
     ]);
    }
}