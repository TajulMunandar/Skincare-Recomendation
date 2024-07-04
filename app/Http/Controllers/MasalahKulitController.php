<?php

namespace App\Http\Controllers;

use App\Models\MasalahKulit;
use Illuminate\Http\Request;

class MasalahKulitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $masalah_kulits = MasalahKulit::all();
        return view('dashboardPage.masalah-kulit.index', [
            'page' => 'Masalah Kulit',
            'masalah_kulits' => $masalah_kulits
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
                'ingridient' => 'required',
            ]);

            MasalahKulit::create($validatedData);

            return redirect()->route('masalah-kulit.index')->with('success', "Data Masalah Kulit $request->nama berhasil diperbarui!");
        } catch (\Illuminate\Validation\ValidationException $exception) {
            return redirect()->route('masalah-kulit.index')->with('failed', "Data $request->nama gagal dibuat! " . $exception->getMessage());
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
    public function update(Request $request, MasalahKulit $masalah_kulit)
    {
        try {
            $rules = [
                'nama' => 'required|max:255',
                'ingridient' => 'required',
            ];

            $validatedData = $this->validate($request, $rules);

            MasalahKulit::where('id', $masalah_kulit->id)->update($validatedData);

            return redirect()->route('masalah-kulit.index')->with('success', "Data Masalah Kulit $masalah_kulit->nama berhasil diperbarui!");
        } catch (\Illuminate\Validation\ValidationException $exception) {
            return redirect()->route('masalah-kulit.index')->with('failed', 'Data gagal diperbarui! ' . $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MasalahKulit $masalah_kulit)
    {
        try {
            MasalahKulit::destroy($masalah_kulit->id);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == 23000) {
                //SQLSTATE[23000]: Integrity constraint violation
                return redirect()->route('masalah-kulit.index')->with('failed', "Masalah Kulit $masalah_kulit->nama tidak dapat dihapus, karena sedang digunakan pada tabel lain!");
            }
        }

        return redirect()->route('masalah-kulit.index')->with('success', "Masalah Kulit $masalah_kulit->nama berhasil dihapus!");
    }
}
