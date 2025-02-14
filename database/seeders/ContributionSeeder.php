<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContributionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('contributions')->insert([
            ['contribute_type' => 'Exco Kolej Kediaman', 'merit' => 15],
            ['contribute_type' => 'Melaporkan Salah Laku Pelajar', 'merit' => 10],
            ['contribute_type' => 'Membantu Warden', 'merit' => 10],
            ['contribute_type' => 'Membantu Penyelia Asrama', 'merit' => 10],
            ['contribute_type' => 'Melibatkan Diri Dalam Semua Program Asrama', 'merit' => 5],
            ['contribute_type' => 'Menjadi Imam', 'merit' => 5],
            ['contribute_type' => 'Menjadi Bilal', 'merit' => 5],
            ['contribute_type' => 'Membantu Exco Kolej Kediaman', 'merit' => 5],
            ['contribute_type' => 'Memastikan Dorm Sentiasa Dalam Keadaan Bersih', 'merit' => 5],
        ]);
        
    }
}
