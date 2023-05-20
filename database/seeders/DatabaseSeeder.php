<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // DB::table('taak_types')->insert([
        //     'taak_type_name' => 'opdracht',
        // ]);
        // DB::table('taak_types')->insert([
        //     'taak_type_name' => 'kernkwadranten',
        // ]);
        // DB::table('taak_types')->insert([
        //     'taak_type_name' => 'doelen',
        // ]);

        User::factory(10)->create();
    }
}
