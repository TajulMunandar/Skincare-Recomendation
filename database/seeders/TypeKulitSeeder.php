<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeKulitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skinTypes = [
            ['nama' => 'Normal'],
            ['nama' => 'Kering'],
            ['nama' => 'Berminyak'],
            ['nama' => 'Sensitif'],
            ['nama' => 'Kombinasi'],
        ];

        DB::table('type_kulits')->insert($skinTypes);
    }
}
