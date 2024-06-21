<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasalahKulitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skinIssues = [
            ['nama' => 'Normal'],
            ['nama' => 'Kering'],
            ['nama' => 'Berminyak'],
            ['nama' => 'Sensitif'],
            ['nama' => 'Kombinasi'],
            ['nama' => 'Jerawat'],
            ['nama' => 'Penuaan dini'],
            ['nama' => 'Hiperpigmentasi'],
            ['nama' => 'Kulit kusam'],
            ['nama' => 'Tekstur kulit tidak merata'],
        ];

        DB::table('masalah_kulits')->insert($skinIssues);
    }
}
