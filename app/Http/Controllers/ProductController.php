<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Kategori;
use App\Models\MasalahKulit;
use App\Models\Product;
use App\Models\TypeKulit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('Brand', 'Kategori', 'TypeKulit', 'MasalahKulit')->get();
        $brands = Brand::all();
        $type_kulits = TypeKulit::all();
        $masalah_kulits = MasalahKulit::all();
        $kategoris = Kategori::all();
        return view('dashboardPage.product.index', [
            'page' => 'Product',
            'products' => $products,
            'brands' => $brands,
            'type_kulits' => $type_kulits,
            'masalah_kulits' => $masalah_kulits,
            'kategoris' => $kategoris,
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
        try {
            $validatedData = $request->validate([
                'nama' => 'required',
                'umur' => 'required',
                'harga' => 'required',
                'id_brand' => 'required',
                'id_type_kulit' => 'required',
                'id_kategori' => 'required',
                'ingridient' => 'required',
                'gambar' => 'required|image|mimes:jpeg,jpg,png'
            ]);

            if ($request->file('gambar')) {
                $validatedData['gambar'] = $request->file('gambar')->store('gambar-product');
            }

            Product::create($validatedData);

            return redirect()->route('product.index')->with('success', "Data Masalah Product $request->nama berhasil diperbarui!");
        } catch (\Illuminate\Validation\ValidationException $exception) {
            return redirect()->route('product.index')->with('failed', "Data $request->nama gagal dibuat! " . $exception->getMessage());
        }
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
    public function update(Request $request, Product $product)
    {
        try {
            $rules = [
                'nama' => 'required',
                'umur' => 'required',
                'harga' => 'required',
                'id_brand' => 'required',
                'id_type_kulit' => 'required',
                'ingridient' => 'required',
                'id_kategori' => 'required',
            ];

            $validatedData = $this->validate($request, $rules);

            if ($request->file('gambar')) {
                if ($request->oldGambar) {
                    Storage::delete($request->oldGambar);
                }
                $validatedData['gambar'] = $request->file('gambar')->store('gambar-product');
            }

            Product::where('id', $product->id)->update($validatedData);

            return redirect()->route('product.index')->with('success', "Data Product $product->nama berhasil diperbarui!");
        } catch (\Illuminate\Validation\ValidationException $exception) {
            return redirect()->route('product.index')->with('failed', 'Data gagal diperbarui! ' . $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            if ($product->gambar) {
                Storage::delete($product->gambar);
            }
            Product::destroy($product->id);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == 23000) {
                //SQLSTATE[23000]: Integrity constraint violation
                return redirect()->route('product.index')->with('failed', "Product $product->nama tidak dapat dihapus, karena sedang digunakan pada tabel lain!");
            }
        }

        return redirect()->route('product.index')->with('success', "Product $product->nama berhasil dihapus!");
    }
}
