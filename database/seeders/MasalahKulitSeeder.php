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
            [
                'nama' => 'Berjerawat',
                'ingridient' => 'asam salisilat, benzoyl peroxide, retinol, asam azelaic, niacinamide, ekstrak lidah buaya, ekstrak teh hijau, ekstrak chamomile'
            ],
            [
                'nama' => 'Komedo',
                'ingridient' => 'asam salisilat, ekstrak tea tree oil, retinol, asam azelaic, alpha hydroxy acids, bentonite clay, ekstrak centella asiatica'
            ],
            [
                'nama' => 'Flex Hitam',
                'ingridient' => 'vitamin c, asam kojic, asam azelaic, asam traneksamat, niacinamide, hidrokuinon, ekstrak licorice, alpha hydroxy acid, beta hydroxy acid'
            ],
            [
                'nama' => 'Rosacea',
                'ingridient' => 'extrak chamomile, aloe vera, niacinamide, asam hialuronat, probiotik, centela asiatica, ekstrak licorice, minyak jojoba, mineral spf'
            ],
            [
                'nama' => 'Bercak Putih',
                'ingridient' => 'asam azelaic, asam kojic, vitamin c, minyak kelapa, eksfolian, asam silsilat'
            ],
            [
                'nama' => 'Kulit Kerutan',
                'ingridient' => 'retinol, peptida, vitamin c, vitamin e, asam hialuronat, asam alfa hidroksi, peeling kimia'
            ],
            [
                'nama' => 'Milia',
                'ingridient' => 'asam silsilat, asam glikolat, retinol, hyaluronic acid, vitamin c'
            ],
            [
                'nama' => 'Kusam',
                'ingridient' => 'asam alfa hidroksi, asam beta hidroksi, niacinamide, vitamin c, ekstrak licorice, peptida, ekstrak gingseng, hyaluronic acid'
            ],
            [
                'nama' => 'Tekelupas',
                'ingridient' => 'asam hialuronat, glycerin, minyak almond, minyak jojoba, madecassoside, aloe vera, ceramides, ekstrak pepaya atau papain'
            ],
        ];

        DB::table('masalah_kulits')->insert($skinIssues);
    }
}
