<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $warden = DB::table('users')->insert([
            'firstname' => "Wardeb",
            'lastname' => " ",
            'email' => "warden@uwu.ac.lk",
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'is_user' => 'warden'
        ]);

        $subWarden = DB::table('users')->insert([
            'firstname' => "Sub",
            'lastname' => "Warden",
            'email' => "subwarden@uwu.ac.lk",
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'is_user' => 'sub_warden'
        ]);

        DB::table('hostels')->insert([
            ['hostel_name' => "Hostel 1"],
            ['hostel_name' => "Hostel 2"],
            ['hostel_name' => "Hostel 3"]

        ]);
    }
}
