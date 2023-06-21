<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => 1,
            'first_name' => 'Anton',
            'last_name' => 'Adman',
            'username' => 'admin',
            'email' => 'anton@test.com',
            'password' => bcrypt('1234'),
            'role_id'=> 1,
        ]);
        DB::table('users')->insert([
            'id' => 2,
            'first_name' => 'Vera',
            'last_name' => 'PM',
            'username' => 'VeraPM',
            'email' => 'vera@test.com',
            'password' => bcrypt('1234'),
            'role_id'=> 2,
        ]);
        DB::table('users')->insert([
            'id' => 3,
            'first_name' => 'John',
            'last_name' => 'Doe',
            'username' => 'johndoe',
            'email' => 'john@test.com',
            'password' => bcrypt('1234'),
            'role_id'=> 3,
        ]);
        DB::table('users')->insert([
            'id' => 4,
            'first_name' => 'Karin',
            'last_name' => 'Tonneman',
            'username' => 'karintonneman',
            'email' => 'karin.tonneman@test.com',
            'password' => bcrypt('1234'),
            'role_id'=> 3,             
        ]);
        
        DB::table('users')->insert([
            'id' =>  5,
            'first_name' => 'Tom',
            'last_name' => 'Mann',
            'username' => 'tommann',
            'email' => 'tom.mann@test.com',
            'password' => bcrypt('1234'),
            'role_id'=> 3,             
        ]);
    }
}