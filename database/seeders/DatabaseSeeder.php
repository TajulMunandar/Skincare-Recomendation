<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $userFactory = new UserFactory(); // Buat instance dari UserFactory
        $this->call([
            BrandSeeder::class,
            TypeKulitSeeder::class,
            MasalahKulitSeeder::class,
            KategoriSeeder::class,
            ProductSeeder::class,
        ]);
        $userFactory->create();
    }
}
