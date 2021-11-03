<?php

namespace Database\Seeders;

use App\Models\Patrons;
use App\Models\Suppliers;
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
        Patrons::factory(12)->create();
        Suppliers::factory(6)->create();

        DB::table('users')->insert([
            'name' => 'team_origin',
            'email' => 'team_origin@protonmail.com',
            'password' => Hash::make('admin'),
            'level' => 'ADMIN',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Zarythex',
            'email' => 'zarythex@protonmail.com',
            'password' => Hash::make('admin'),
            'level' => 'EDP',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Grempoots2',
            'email' => 'grempoots2@protonmail.com',
            'password' => Hash::make('admin'),
            'level' => 'OPERATOR',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
