<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            ['firstname' => 'A', 'lastname' => 'F', 'hobby' => 'football', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['firstname' => 'B', 'lastname' => 'G', 'hobby' => 'basketball', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['firstname' => 'C', 'lastname' => 'H', 'hobby' => 'table tennis', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['firstname' => 'D', 'lastname' => 'I', 'hobby' => 'swimming', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['firstname' => 'E', 'lastname' => 'J', 'hobby' => 'jogging', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];
        DB::table('users')->insert($data);
    }
}
