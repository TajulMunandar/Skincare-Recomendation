<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            ['nama' => 'SK-II'],
            ['nama' => 'Innisfree'],
            ['nama' => 'The Ordinary'],
            ['nama' => 'Laneige'],
            ['nama' => 'Kiehl\'s'],
            ['nama' => 'La Roche-Posay'],
            ['nama' => 'Neutrogena'],
            ['nama' => 'Cetaphil'],
            ['nama' => 'Sulwhasoo'],
            ['nama' => 'Hada Labo'],
        ];

        DB::table('brands')->insert($brands);
    }
}
