<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JabatanDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('jabatan_data')->insert([
            ['jabatan' => 'Pekerja profesional dan sejenisnya', 'laki_laki' => 436, 'perempuan' => 387],
            ['jabatan' => 'Pekerja dibidang pemerintahan', 'laki_laki' => 30, 'perempuan' => 42],
            ['jabatan' => 'Pekerja dibidang jasa', 'laki_laki' => 188, 'perempuan' => 237],
            ['jabatan' => 'Pekerja dibidang penjualan', 'laki_laki' => 92, 'perempuan' => 96],
            ['jabatan' => 'Pekerja dibidang produksi dan sejenisnya serta operator alat angkutan', 'laki_laki' => 476, 'perempuan' => 100],
            ['jabatan' => 'Pekerja di bidang pertanian dan peternakan', 'laki_laki' => 8, 'perempuan' => 8],
            ['jabatan' => 'Pekerja dibidang pelaksana (TU)', 'laki_laki' => 830, 'perempuan' => 1064],
        ]);
    }
}
