<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use \Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => "Supervisi",
            'username' => "supervisi",
            'email' => "fritznaga41@gmail.com",
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('secret'),
            'role' => 'supervisi',
            'is_blocked' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        User::create([
            'name' => "Customer Service 1",
            'username' => "custserv1",
            'email' => "danielsinaga53@gmail.com",
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('secret'),
            'role' => 'cs',
            'is_blocked' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        User::create([
            'name' => "Customer Service 2",
            'username' => "custserv2",
            'email' => "fritzalive41@gmail.com",
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('secret'),
            'role' => 'cs',
            'is_blocked' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
