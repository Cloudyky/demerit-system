<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OffenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('offenses')->insert([
            ['offense_type' => 'Membuli', 'demerit' => 40],
            ['offense_type' => 'Melakukan kesalahan berkaitan seksual', 'demerit' => 40],
            ['offense_type' => 'Terlibat dalam kegiatan dadah', 'demerit' => 40],
            ['offense_type' => 'Terlibat tentang kegiatan minuman beralkohol', 'demerit' => 40],
            ['offense_type' => 'Bergaduh/Memukul/Menyebabkan kematian', 'demerit' => 40],
            ['offense_type' => 'Mengamalkan ajaran sesat atau perkara yang berkaitan dengannya', 'demerit' => 40],
            ['offense_type' => 'Keluar dari kawasan asrama tanpa kebenaran', 'demerit' => 30],
            ['offense_type' => 'Vandalisme', 'demerit' => 30],
            ['offense_type' => 'Merokok termasuk rokok elektronik', 'demerit' => 20],
            ['offense_type' => 'Membawa atau menggunakan bahan letupan', 'demerit' => 20],
            ['offense_type' => 'Membawa tetamu luar masuk ke kolej tanpa kebenaran', 'demerit' => 20],
            ['offense_type' => 'Biadab dan tingkah laku tidak sopan', 'demerit' => 15],
            ['offense_type' => 'Membawa dan menggunakan barang larangan', 'demerit' => 10],
            ['offense_type' => 'Berambut panjang atau berwarna', 'demerit' => 10],
            ['offense_type' => 'Lewat ke sekolah', 'demerit' => 5],
            ['offense_type' => 'Lewat atau ponteng program kolej kediaman', 'demerit' => 5],
            ['offense_type' => 'Lewat atau ponteng solat di surau', 'demerit' => 5],
            ['offense_type' => 'Tidak menjaga kebersihan dorm atau kolej kediaman', 'demerit' => 5],
            ['offense_type' => 'Tidak mematuhi arahan warden', 'demerit' => 5],
        ]);
    }
}
