<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['nama' => 'Anti-Aging'],       // Kategori untuk produk anti-penuaan
            ['nama' => 'Hydrating'],        // Kategori untuk produk yang memberikan hidrasi
            ['nama' => 'Acne Treatment'],   // Kategori untuk produk perawatan jerawat
            ['nama' => 'Brightening'],      // Kategori untuk produk yang mencerahkan kulit
            ['nama' => 'Soothing'],         // Kategori untuk produk yang menenangkan kulit sensitif
        ];

        // Insert data into the kategoris table
        DB::table('kategoris')->insert($categories);
    }
}
