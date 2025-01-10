<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KesalahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kesalahan')->insert([
            ['jenis_kesalahan' => 'Membuli', 'dimerit' => 40],
            ['jenis_kesalahan' => 'Melakukan kesalahan berkaitan seksual', 'dimerit' => 40],
            ['jenis_kesalahan' => 'Terlibat dalam kegiatan dadah', 'dimerit' => 40],
            ['jenis_kesalahan' => 'Terlibat tentang kegiatan minuman beralkohol', 'dimerit' => 40],
            ['jenis_kesalahan' => 'Bergaduh/Memukul/Menyebabkan kematian', 'dimerit' => 40],
            ['jenis_kesalahan' => 'Mengamalkan ajaran sesat atau perkara yang berkaitan dengannya', 'dimerit' => 40],
            ['jenis_kesalahan' => 'Keluar dari kawasan asrama tanpa kebenaran', 'dimerit' => 30],
            ['jenis_kesalahan' => 'Vandalisme', 'dimerit' => 30],
            ['jenis_kesalahan' => 'Merokok termasuk rokok elektronik', 'dimerit' => 20],
            ['jenis_kesalahan' => 'Membawa atau menggunakan bahan letupan', 'dimerit' => 20],
            ['jenis_kesalahan' => 'Membawa tetamu luar masuk ke kolej tanpa kebenaran', 'dimerit' => 20],
            ['jenis_kesalahan' => 'Biada dan tingkah laku tidak sopan', 'dimerit' => 15],
            ['jenis_kesalahan' => 'Membawa dan menggunakan barang larangan', 'dimerit' => 10],
            ['jenis_kesalahan' => 'Berambut panjang atau berwarna', 'dimerit' => 10],
            ['jenis_kesalahan' => 'Lewat ke sekolah', 'dimerit' => 5],
            ['jenis_kesalahan' => 'Lewat atau ponteng program kolej kediaman', 'dimerit' => 5],
            ['jenis_kesalahan' => 'Lewat atau ponteng solat di surau', 'dimerit' => 5],
            ['jenis_kesalahan' => 'Tidak menjaga kebersihan dorm atau kolej kediaman', 'dimerit' => 5],
            ['jenis_kesalahan' => 'Tidak mematuhi arahan warden', 'dimerit' => 5],
        ]);
    }
}
