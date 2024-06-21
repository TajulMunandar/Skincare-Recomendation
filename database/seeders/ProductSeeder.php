<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'nama' => 'Facial Treatment Essence',
                'umur' => 'All Ages',
                'harga' => 800000,
                'id_brand' => 1,            // SK-II
                'id_type_kulit' => 1,       // Normal
                'id_masalah_kulit' => 4,    // Sensitif
                'id_kategori' => 1,         // Anti-Aging
                'gambar' => 'skii_facial_treatment.jpg',
            ],
            [
                'nama' => 'Facial Treatment Essence',
                'umur' => 'All Ages',
                'harga' => 1200000,
                'id_brand' => 1,            // SK-II
                'id_type_kulit' => 1,       // Normal
                'id_masalah_kulit' => 1,    // Normal
                'id_kategori' => 2,         // Hydrating
                'gambar' => 'skii_facial_treatment_essence.jpg',
            ],
            [
                'nama' => 'Hydrating Lotion',
                'umur' => 'All Ages',
                'harga' => 75000,
                'id_brand' => 10,           // Hada Labo
                'id_type_kulit' => 2,       // Kering
                'id_masalah_kulit' => 2,    // Kering
                'id_kategori' => 2,         // Hydrating
                'gambar' => 'hadalabo_hydrating_lotion.jpg',
            ],
            [
                'nama' => 'Concentrated Ginseng Renewing Cream',
                'umur' => '25+',
                'harga' => 1200000,
                'id_brand' => 9,            // Sulwhasoo
                'id_type_kulit' => 1,       // Normal
                'id_masalah_kulit' => 7,    // Penuaan dini
                'id_kategori' => 1,         // Anti-Aging
                'gambar' => 'sulwhasoo_ginseng_renewing_cream.jpg',
            ],
            [
                'nama' => 'Rapid Age Spot and Pigment Lightening Serum',
                'umur' => '25+',
                'harga' => 300000,
                'id_brand' => 7,            // Neutrogena
                'id_type_kulit' => 1,       // Normal
                'id_masalah_kulit' => 8,    // Hiperpigmentasi
                'id_kategori' => 4,         // Brightening
                'gambar' => 'neutrogena_rapid_age_spot_lightening_serum.jpg',
            ],
            [
                'nama' => 'Ultra Facial Deep Moisture Balm',
                'umur' => 'All Ages',
                'harga' => 420000,
                'id_brand' => 7,            // Neutrogena
                'id_type_kulit' => 2,       // Kering
                'id_masalah_kulit' => 2,    // Kering
                'id_kategori' => 2,         // Hydrating
                'gambar' => 'neutrogena_ultra_facial_deep_moisture_balm.jpg',
            ],
            [
                'nama' => 'Green Tea Seed Serum',
                'umur' => 'All Ages',
                'harga' => 250000,
                'id_brand' => 2,            // Innisfree
                'id_type_kulit' => 1,       // Normal
                'id_masalah_kulit' => 1,    // Normal
                'id_kategori' => 2,         // Hydrating
                'gambar' => 'innisfree_green_tea_seed_serum.jpg',
            ],
            [
                'nama' => 'Green Tea Seed Serum',
                'umur' => 'All Ages',
                'harga' => 280000,
                'id_brand' => 2,            // Innisfree
                'id_type_kulit' => 5,       // Kombinasi
                'id_masalah_kulit' => 1,    // Normal
                'id_kategori' => 2,         // Hydrating
                'gambar' => 'innisfree_green_tea_seed_serum.jpg',
            ],
            [
                'nama' => 'Niacinamide 10% + Zinc 1%',
                'umur' => 'All Ages',
                'harga' => 120000,
                'id_brand' => 3,            // The Ordinary
                'id_type_kulit' => 3,       // Berminyak
                'id_masalah_kulit' => 6,    // Jerawat
                'id_kategori' => 3,         // Serum
                'gambar' => 'theordinary_niacinamide_zinc.jpg',
            ],
            [
                'nama' => 'Gokujyun Ultimate Moisturizing Lotion',
                'umur' => 'All Ages',
                'harga' => 150000,
                'id_brand' => 10,           // Hada Labo
                'id_type_kulit' => 1,       // Normal
                'id_masalah_kulit' => 2,    // Kering
                'id_kategori' => 2,         // Hydrating
                'gambar' => 'hadalabo_gokujyun_moisturizing_lotion.jpg',
            ],
            [
                'nama' => 'Niacinamide 10% + Zinc 1%',
                'umur' => 'All Ages',
                'harga' => 90000,
                'id_brand' => 3,            // The Ordinary
                'id_type_kulit' => 3,       // Berminyak
                'id_masalah_kulit' => 3,    // Berminyak
                'id_kategori' => 3,         // Acne Treatment
                'gambar' => 'theordinary_niacinamide_zinc.jpg',
            ],

            [
                'nama' => 'Water Bank Moisture Cream',
                'umur' => 'All Ages',
                'harga' => 380000,
                'id_brand' => 4,            // Laneige
                'id_type_kulit' => 2,       // Kering
                'id_masalah_kulit' => 2,    // Kering
                'id_kategori' => 2,         // Hydrating
                'gambar' => 'laneige_water_bank_moisture_cream.jpg',
            ],
            [
                'nama' => 'Moisturizing Cream',
                'umur' => 'All Ages',
                'harga' => 40000,
                'id_brand' => 8,            // Cetaphil
                'id_type_kulit' => 1,       // Normal
                'id_masalah_kulit' => 1,    // Normal
                'id_kategori' => 2,         // Hydrating
                'gambar' => 'cetaphil_moisturizing_cream.jpg',
            ],
            [
                'nama' => 'Effaclar Duo (+)',
                'umur' => 'All Ages',
                'harga' => 300000,
                'id_brand' => 6,            // La Roche-Posay
                'id_type_kulit' => 3,       // Berminyak
                'id_masalah_kulit' => 6,    // Jerawat
                'id_kategori' => 3,        // Treatment
                'gambar' => 'larocheposay_effaclar_duo.jpg',
            ],
            [
                'nama' => 'Moisture Surge 72-Hour Auto-Replenishing Hydrator',
                'umur' => 'All Ages',
                'harga' => 385000,
                'id_brand' => 4,            // Clinique
                'id_type_kulit' => 2,       // Kering
                'id_masalah_kulit' => 2,    // Kering
                'id_kategori' => 2,         // Hydrating
                'gambar' => 'clinique_moisture_surge.jpg',
            ],
            [
                'nama' => 'Cicapair Tiger Grass Color Correcting Treatment',
                'umur' => 'All Ages',
                'harga' => 590000,
                'id_brand' => 5,            // Dr. Jart+
                'id_type_kulit' => 5,       // Kombinasi
                'id_masalah_kulit' => 5,    // Kombinasi
                'id_kategori' => 4,         // Brightening
                'gambar' => 'drjart_cicapair_tiger_grass.jpg',
            ],
            [
                'nama' => 'Advanced Night Repair Synchronized Recovery Complex II',
                'umur' => '25+',
                'harga' => 1200000,
                'id_brand' => 6,            // Estée Lauder
                'id_type_kulit' => 1,       // Normal
                'id_masalah_kulit' => 7,    // Penuaan dini
                'id_kategori' => 1,         // Anti-Aging
                'gambar' => 'esteelauder_advanced_night_repair.jpg',
            ],
            [
                'nama' => 'AHA 30% + BHA 2% Peeling Solution',
                'umur' => 'All Ages',
                'harga' => 130000,
                'id_brand' => 3,            // The Ordinary
                'id_type_kulit' => 4,       // Sensitif
                'id_masalah_kulit' => 8,    // Hiperpigmentasi
                'id_kategori' => 5,         // Exfoliating
                'gambar' => 'theordinary_aha_bha_peeling_solution.jpg',
            ],
            [
                'nama' => 'Ultra Facial Cream',
                'umur' => 'All Ages',
                'harga' => 415000,
                'id_brand' => 7,            // Neutrogena
                'id_type_kulit' => 2,       // Kering
                'id_masalah_kulit' => 1,    // Normal
                'id_kategori' => 2,         // Hydrating
                'gambar' => 'neutrogena_ultra_facial_cream.jpg',
            ],
            [
                'nama' => 'Daily Reviving Concentrate',
                'umur' => '25+',
                'harga' => 660000,
                'id_brand' => 5,            // Kiehl's
                'id_type_kulit' => 3,       // Berminyak
                'id_masalah_kulit' => 9,    // Kulit kusam
                'id_kategori' => 4,         // Brightening
                'gambar' => 'kiehls_daily_reviving_concentrate.jpg',
            ],
            [
                'nama' => 'Luminous Dewy Skin Mist',
                'umur' => 'All Ages',
                'harga' => 700000,
                'id_brand' => 8,            // Tatcha
                'id_type_kulit' => 5,       // Kombinasi
                'id_masalah_kulit' => 5,    // Kombinasi
                'id_kategori' => 4,         // Brightening
                'gambar' => 'tatcha_luminous_dewy_skin_mist.jpg',
            ],
            [
                'nama' => 'Ultra Facial Oil-Free Gel Cream',
                'umur' => 'All Ages',
                'harga' => 415000,
                'id_brand' => 7,            // Neutrogena
                'id_type_kulit' => 3,       // Berminyak
                'id_masalah_kulit' => 3,
                'id_kategori' => 2,         // Hydrating
                'gambar' => 'neutrogena_ultra_facial_gel_cream.jpg',
            ],
            [
                'nama' => 'Balancing Moisturizer',
                'umur' => 'All Ages',
                'harga' => 160000,
                'id_brand' => 8,            // Cetaphil
                'id_type_kulit' => 3,       // Berminyak
                'id_masalah_kulit' => 1,    // Normal
                'id_kategori' => 2,         // Hydrating
                'gambar' => 'cetaphil_balancing_moisturizer.jpg',
            ],
            [
                'nama' => 'Laneige Water Sleeping Mask',
                'harga' => 250000,
                'umur' => 'All Ages', // Informasi umur penggunaan produk Laneige Water Sleeping Mask
                'id_brand' => 4,            // Laneige
                'id_type_kulit' => 1,       // Normal
                'id_masalah_kulit' => 1,    // Normal
                'id_kategori' => 2,         // Hydrating
                'gambar' => 'laneige_water_sleeping_mask.jpg',
            ],
            [
                'nama' => 'Innisfree Super Volcanic Pore Clay Mask 2X',
                'harga' => 150000,
                'umur' => 'All Ages', // Informasi umur penggunaan produk Innisfree Super Volcanic Pore Clay Mask 2X
                'id_brand' => 2,            // Innisfree
                'id_type_kulit' => 3,       // Berminyak
                'id_masalah_kulit' => 6,    // Jerawat
                'id_kategori' => 3,         // Acne Treatment
                'gambar' => 'innisfree_super_volcanic_clay_mask.jpg',
            ],
            [
                'nama' => 'Laneige Lip Sleeping Mask',
                'harga' => 250000,
                'umur' => 'All Ages', // Informasi umur penggunaan produk Laneige Lip Sleeping Mask
                'id_brand' => 4,            // Laneige
                'id_type_kulit' => 1,       // Normal
                'id_masalah_kulit' => 1,    // Normal
                'id_kategori' => 2,         // Hydrating
                'gambar' => 'laneige_lip_sleeping_mask.jpg',
            ],
            [
                'nama' => 'Kiehl\'s Midnight Recovery Concentrate',
                'harga' => 800000,
                'umur' => '25+', // Informasi umur penggunaan produk Kiehl's Midnight Recovery Concentrate
                'id_brand' => 5,            // Kiehl's
                'id_type_kulit' => 1,       // Normal
                'id_masalah_kulit' => 7,    // Penuaan dini
                'id_kategori' => 1,         // Anti-Aging
                'gambar' => 'kiehls_midnight_recovery_concentrate.jpg',
            ],
            [
                'nama' => 'Dr.Jart+ Cicapair Cream',
                'harga' => 680000,
                'umur' => 'All Ages', // Informasi umur penggunaan produk Dr.Jart+ Cicapair Cream
                'id_brand' => 5,            // Dr.Jart+
                'id_type_kulit' => 4,       // Sensitif
                'id_masalah_kulit' => 5,    // Kombinasi
                'id_kategori' => 5,         // Soothing
                'gambar' => 'drjart_cicapair_cream.jpg',
            ],
            [
                'nama' => 'Tatcha The Water Cream',
                'harga' => 900000,
                'umur' => '25+', // Informasi umur penggunaan produk Tatcha The Water Cream
                'id_brand' => 8,            // Tatcha
                'id_type_kulit' => 2,       // Kering
                'id_masalah_kulit' => 2,    // Kering
                'id_kategori' => 2,         // Hydrating
                'gambar' => 'tatcha_water_cream.jpg',
            ],
            [
                'nama' => 'R.N.A. Power Radical New Age Cream',
                'umur' => 'All Ages',
                'harga' => 1400000,
                'id_brand' => 1,            // SK-II
                'id_type_kulit' => 1,       // Normal
                'id_masalah_kulit' => 7,    // Penuaan dini
                'id_kategori' => 1,         // Anti-Aging
                'gambar' => 'skii_rna_power_cream.jpg',
            ],
            [
                'nama' => 'Jeju Orchid Enriched Cream',
                'umur' => 'All Ages',
                'harga' => 380000,
                'id_brand' => 2,            // Innisfree
                'id_type_kulit' => 2,       // Kering
                'id_masalah_kulit' => 2,    // Kering
                'id_kategori' => 2,         // Hydrating
                'gambar' => 'innisfree_jeju_orchid_enriched_cream.jpg',
            ],
            [
                'nama' => 'Hydro Boost Water Gel',
                'umur' => 'All Ages',
                'harga' => 210000,
                'id_brand' => 7,            // Neutrogena
                'id_type_kulit' => 3,       // Berminyak
                'id_masalah_kulit' => 1,    // Normal
                'id_kategori' => 2,         // Hydrating
                'gambar' => 'neutrogena_hydro_boost_water_gel.jpg',
            ],


        ];

        // Insert data into the products table
        DB::table('products')->insert($products);
    }
}
