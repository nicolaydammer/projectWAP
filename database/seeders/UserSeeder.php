<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'adwin',
            'email' => 'admin@welkom.com',
            'password' => Hash::make('welkom1234'),
        ]);


        DB::table('model_has_roles')->insert
        (
            [
                'role_id' => '1',
                'model_type' => 'App\Models\User',
                'model_id' => '14',
            ]
        );


    }
}
