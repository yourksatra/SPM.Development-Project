<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateIdPuskesmasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Array dengan kode yang diinginkan
        $codes = [
            'P001SBW', 'P002SBW', 'P003SBW', 'P004SBW', 'P005SBW', 'P006SBW',
            'P007SBW', 'P008SBW', 'P009SBW', 'P010SBW', 'P011SBW', 'P012SBW',
            'P013SBW', 'P014SBW', 'P015SBW', 'P016SBW', 'P017SBW', 'P018SBW',
            'P019SBW', 'P020SBW', 'P021SBW', 'P022SBW', 'P023SBW', 'P024SBW',
            'P025SBW', 'P026SBW'
        ];

        // Ambil data puskesmas dari database
        $puskesmas = DB::table('puskesmas')->get();

        // Perbarui setiap puskesmas dengan kode baru
        foreach ($puskesmas as $index => $puskesma) {
            DB::table('puskesmas')
                ->where('IdPuskesmas', $puskesma->IdPuskesmas)
                ->update(['IdPuskesmas' => $codes[$index]]);
        }
    }
}