<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create multiple users
        DB::table('users')->insert([
            [
                'email' => 'test1@example.com',
                'password' => bcrypt('abc123456'),
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'email' => 'test2@example.com',
                'password' => bcrypt('abc123456'),
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'email' => 'test3@example.com',
                'password' => bcrypt('abc123456'),
                'created_at' => date('Y-m-d H:i:s')
            ],
        ]);
    }
}
