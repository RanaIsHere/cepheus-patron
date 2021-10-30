<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(32)->create();

        DB::table('users')->insert([
            'name' => 'team_origin',
            'email' => 'team_origin@protonmail.com',
            'password' => Hash::make('admin'),
            'level' => 'ADMIN',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
