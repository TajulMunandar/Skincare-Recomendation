<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Kategori;
use App\Models\MasalahKulit;
use App\Models\Product;
use App\Models\TypeKulit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RekomendasiController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $brands = Brand::all();
        $type_kulits = TypeKulit::all();
        $masalah_kulits = MasalahKulit::all();
        $kategoris = Kategori::all();
        return view('dashboardPage.rekomendasi.index', [
            'page' => 'Rekomendasi',
            'products' => $products,
            'brands' => $brands,
            'type_kulits' => $type_kulits,
            'masalah_kulits' => $masalah_kulits,
            'kategoris' => $kategoris,
        ]);
    }

    public function saveRecommendations(Request $request)
    {
        try {
            // Ambil data dari respons Python
            $data = $request->input('data');

            // Inisialisasi array untuk menyimpan data produk
            $productsData = [];

            // Loop melalui setiap entri dalam data dan ambil ID produk
            foreach ($data as $entry) {
                $productId = $entry['Id'];

                // Gunakan ID produk untuk mengambil data produk dari database
                $product = Product::find($productId);

                // Jika produk ditemukan, tambahkan ke array data produk
                if ($product) {
                    $productData = [
                        'Nama' => $product->nama,
                        'Brand' => $product->Brand->nama,
                        'Harga' => $product->harga,
                        'Kategori' => $product->Kategori->nama,
                        'Masalah_Kulit' => $product->Masalah_Kulit->nama,
                        'ingridient' => $product->Masalah_Kulit->ingridient,
                        'Tipe_Kulit' => $product->Tipe_Kulit->nama,
                        'Umur' => $product->umur
                    ];

                    $productsData[] = $productData;
                }
            }

            // Beri respons kembali dengan data produk jika berhasil
            return response()->json(['message' => 'Product data retrieved successfully', 'products' => $productsData]);
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            Log::error('Error while saving recommendations: ' . $e->getMessage());

            // Beri respons kembali dengan pesan kesalahan
            return response()->json(['error' => 'An error occurred while saving recommendations. Please try again later.'], 500);
        }
    }

    public function getData()
    {
        // Mengambil semua data produk dari database
        $products = Product::all();

        // Mengonversi data produk ke dalam format yang dapat digunakan oleh Python
        $skincareData = [];
        foreach ($products as $product) {
            $skincareData[] = [
                'Id' => $product->id,
                'Nama' => $product->nama,
                'Brand' => $product->Brand->nama, // Asumsikan ada relasi dengan tabel brands
                'Tipe_Kulit' => $product->TypeKulit->nama, // Asumsikan ada relasi dengan tabel type_kulits
                'Kategori' => $product->Kategori->nama, // Asumsikan ada relasi dengan tabel kategoris
                'Harga' => $product->harga,
                'Umur' => $product->umur,
                'ingridient' => $product->ingridient,
                'gambar' => $product->gambar,
            ];
        }

        return response()->json($skincareData);
    }
}
