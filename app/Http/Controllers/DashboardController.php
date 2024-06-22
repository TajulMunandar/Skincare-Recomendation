<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Kategori;
use App\Models\TypeKulit;
use Illuminate\Support\Facades\File;
use App\Models\Category;
use App\Models\feedback;
use App\Models\Mahasiswa;
use App\Models\MasalahKulit;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::count();
        $brand = Brand::count();
        $tipe_kulit = TypeKulit::count();
        $kategori = Kategori::count();
        $masalah = MasalahKulit::count();
        return view('dashboardPage.index', [
            'page' => 'Dashboard',
            'produk' => $product,
            'brand' => $brand,
            'tipe' => $tipe_kulit,
            'kategori' => $kategori,
            'masalah' => $masalah,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
