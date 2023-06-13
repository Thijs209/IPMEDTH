<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            'name'=>'Admin',
        ]);
        
        DB::table('roles')->insert([
            'name'=>'People Manager',
        ]);
        
        DB::table('roles')->insert([
            'name'=>'Employee',
        ]);
    }
}