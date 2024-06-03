<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => "khanhngoc85672912345",
            'email' => "khanhngoc945612@gmail.com",
            'password' => Hash::make('856729ngoc1246612'),
            'phone' => "0987767878",
            'status' => 1,
            'id_roles' => 1
        ]);
  
        
    }
}
