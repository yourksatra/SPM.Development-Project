<?php

namespace Database\Seeders;

use App\Models\User as ModelsUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsUser::create([
            'Nama' => '',
            'Alamat' =>'',
            'NoTelpon' =>'',
            'username' =>'Admin',
            'password' =>'12345',
            'Status' => 1,
            'role'=> 1,
            'IdPuskesmas' =>'NULL',
        ]);
    }
}
