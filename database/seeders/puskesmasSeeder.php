<?php

namespace Database\Seeders;

use App\Models\Puskesmas as ModelsPuskesmas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class puskesmasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsPuskesmas::create([
            'IdPuskesmas' => 'PRHEE',
            'Nama' => 'PUSKESMAS RHEE',
            'Alamat' => 'Jl. Lintas Sumbawa Tano KM 33 Desa Rhee',
            'Kecamatan' => 'Rhee',
            'email' => 'upt.pkmrhee@gmail.com',
        ]);
        ModelsPuskesmas::create([
            'IdPuskesmas' => 'PBTLANT',
            'Nama' => 'PUSKESMAS BATULANTEH',
            'Alamat' => 'Jl. Raya Semongkat - Batudulang KM 17 Desa Klungkung',
            'Kecamatan' => 'Batulanteh ',
            'email' => 'pkmbatulanteh@gmail.com',
        ]);
        ModelsPuskesmas::create([
            'IdPuskesmas' => 'PSBWUNT1',
            'Nama' => 'PUSKESMAS SUMBAWA UNIT I',
            'Alamat' => 'Jl. Setia Budi No.5 Kelurahan Seketeng',
            'Kecamatan' => 'Sumbawa',
            'email' => 'bendaharaunit1@gmail.com',
        ]);
        ModelsPuskesmas::create([
            'IdPuskesmas' => 'PSBWUNT2',
            'Nama' => 'PUSKESMAS SUMBAWA UNIT II',
            'Alamat' => 'Jl. Cendrawasih No.144 Kelurahan Brang Biji',
            'Kecamatan' => 'Sumbawa',
            'email' => 'pkmunitduasumbawa@gmail.com',
        ]);
        ModelsPuskesmas::create([
            'IdPuskesmas' => 'PLBUNT1',
            'Nama' => 'PUSKESMAS LAB. BADAS UNIT I',
            'Alamat' => 'Dsn. Kalibaru RT 001 RW 012 Desa Lab. Sumbawa',
            'Kecamatan' => 'Lab. Badas',
            'email' => 'puskesmaslabuhanbadasunit1@gmail.com',
        ]);
        ModelsPuskesmas::create([
            'IdPuskesmas' => 'PLBUNT2',
            'Nama' => 'PUSKESMAS LAB. BADAS UNIT II',
            'Alamat' => 'Dsn. Sebotok Desa Sebotok',
            'Kecamatan' => 'Lab. Badas',
            'email' => 'pkm.sebotok@gmail.com',
        ]);
        ModelsPuskesmas::create([
            'IdPuskesmas' => 'PMYHLR',
            'Nama' => 'PUSKESMAS MOYO HILIR',
            'Alamat' => 'Jl. Pendidikan No. 1 Desa Berare',
            'Kecamatan' => 'Moyo Hilir',
            'email' => 'pkmmoyohilir@gmail.com',
        ]);
        ModelsPuskesmas::create([
            'IdPuskesmas' => 'PMYHLU',
            'Nama' => 'PUSKESMAS MOYO HULU',
            'Alamat' => 'Jl. Lintas Sumbawa Lunyuk KM 21 Dsn. Pandansari Desa Maman',
            'Kecamatan' => 'Moyo Hulu',
            'email' => 'pkmmoyohulu18@gmail.com',
        ]);
        ModelsPuskesmas::create([
            'IdPuskesmas' => 'PUNIWS',
            'Nama' => 'PUSKESMAS UNTER IWES',
            'Alamat' => 'Jl. Unter Iwes No. 7 Desa Kerato',
            'Kecamatan' => 'Unter Iwes',
            'email' => 'pkmui07@gmail.com',
        ]);
        ModelsPuskesmas::create([
            'IdPuskesmas' => 'PROPNG',
            'Nama' => 'PUSKESMAS ROPANG',
            'Alamat' => 'Jl. Usaha Tani No. 01 Desa Ropang',
            'Kecamatan' => 'Ropang',
            'email' => 'puskesmaskecamatanropang@gmail.com',
        ]);
        ModelsPuskesmas::create([
            'IdPuskesmas' => 'PLNGUAR',
            'Nama' => 'PUSKESMAS LENANGGUAR',
            'Alamat' => 'Jl. Raya Sumbawa Lunyuk KM 40 Desa Lenangguar',
            'Kecamatan' => 'Lenangguar',
            'email' => 'lenangguarpuskesmas@gmail.com',
        ]);
        ModelsPuskesmas::create([
            'IdPuskesmas' => 'PLNTUNG',
            'Nama' => 'PUSKESMAS LANTUNG',
            'Alamat' => 'Jl. Lintas Sumbawa Ropang Desa Ai Mual',
            'Kecamatan' => 'Lantung',
            'email' => 'puskesmas.lantung@gmail.com',
        ]);
        ModelsPuskesmas::create([
            'IdPuskesmas' => 'PLAPE',
            'Nama' => 'PUSKESMAS LAPE',
            'Alamat' => 'Jl. Lintas Sumbwa Bima KM 38 Desa Lape',
            'Kecamatan' => 'Lape',
            'email' => 'puskesmaslape@gmail.com',
        ]);
        ModelsPuskesmas::create([
            'IdPuskesmas' => 'PLPOK',
            'Nama' => 'PUSKESMAS LOPOK',
            'Alamat' => 'Jl. Lintas Sumbawa Bima KM 23 Desa Lopok',
            'Kecamatan' => 'Lopok',
            'email' => 'upt.puskesmaslopok@gmail.com',
        ]);
        ModelsPuskesmas::create([
            'IdPuskesmas' => 'PLMPNG',
            'Nama' => 'PUSKESMAS PELAMPANG',
            'Alamat' => 'Jl. Lintas Sumbawa Bima KM 62 Desa Plampang',
            'Kecamatan' => 'Plampang',
            'email' => 'puskesmasplampang@gmail.com',
        ]);
        ModelsPuskesmas::create([
            'IdPuskesmas' => 'PLBNGKA',
            'Nama' => 'PUSKESMAS LABANGKA',
            'Alamat' => 'Jl. Lingkar Selatan Desa Sukadamai',
            'Kecamatan' => 'Labangka',
            'email' => 'uptpuskesmaslabangka@gmail.com',
        ]);
        ModelsPuskesmas::create([
            'IdPuskesmas' => 'PMRNG',
            'Nama' => 'PUSKESMAS MARONGE',
            'Alamat' => 'Jl. Lintas Sumbawa Bima KM 41 Desa Simu',
            'Kecamatan' => 'Maronge',
            'email' => 'pkmmaronge@gmail.com',
        ]);
        ModelsPuskesmas::create([
            'IdPuskesmas' => 'PEMPNG',
            'Nama' => 'PUSKESMAS EMPANG',
            'Alamat' => 'Jl. Lintas Sumbawa Bima KM 92 Desa Pamanto ',
            'Kecamatan' => 'Empang',
            'email' => 'puskesmasempang92@gmail.com',
        ]);
        ModelsPuskesmas::create([
            'IdPuskesmas' => 'PTARNO',
            'Nama' => 'PUSKESMAS TARANO',
            'Alamat' => 'Jl. Lintas Sumbawa Tano KM 100 Desa Lab. Bontong',
            'Kecamatan' => 'Tarano',
            'email' => 'puskesmastarano@gmail.com',
        ]);
    }
}
