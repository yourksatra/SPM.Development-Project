<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UpdateUserPasswordsSeeder extends Seeder
{
    public function run()
    {
        // Update password for user with IdUser 2
        DB::table('users')->where('IdUser', 2)->update([
            'password' => Hash::make('user')
        ]);

        // Update password for user with IdUser 5
        DB::table('users')->where('IdUser', 5)->update([
            'password' => Hash::make('12345')
        ]);
    }
}
