<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            'name' => "admin",
        ]);
        DB::table('roles')->insert([
            'name' => "student",
        ]);
        DB::table('roles')->insert([
            'name' => "teacher",
        ]);
    }
}
