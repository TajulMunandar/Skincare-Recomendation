<?php

namespace App\Http\Controllers;

use App\Models\TypeKulit;
use Illuminate\Http\Request;

class TipeKulitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipe_kulits = TypeKulit::all();
        return view('dashboardPage.tipe-kulit.index', [
            'page' => 'Tipe Kulit',
            'tipe_kulits' => $tipe_kulits
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
            ]);

            TypeKulit::create($validatedData);

            return redirect()->route('tipe-kulit.index')->with('success', "Data Tipe Kulit $request->nama berhasil diperbarui!");
        } catch (\Illuminate\Validation\ValidationException $exception) {
            return redirect()->route('tipe-kulit.index')->with('failed', "Data $request->nama gagal dibuat! " . $exception->getMessage());
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
    public function update(Request $request, TypeKulit $tipe_kulit)
    {
        try {
            $rules = [
                'nama' => 'required|max:255',
            ];

            $validatedData = $this->validate($request, $rules);

            TypeKulit::where('id', $tipe_kulit->id)->update($validatedData);

            return redirect()->route('tipe-kulit.index')->with('success', "Data Tipe Kulit $tipe_kulit->nama berhasil diperbarui!");
        } catch (\Illuminate\Validation\ValidationException $exception) {
            return redirect()->route('tipe-kulit.index')->with('failed', 'Data gagal diperbarui! ' . $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeKulit $tipe_kulit)
    {
        try {
            TypeKulit::destroy($tipe_kulit->id);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == 23000) {
                //SQLSTATE[23000]: Integrity constraint violation
                return redirect()->route('tipe-kulit.index')->with('failed', "Tipe Kulit $tipe_kulit->nama tidak dapat dihapus, karena sedang digunakan pada tabel lain!");
            }
        }

        return redirect()->route('tipe-kulit.index')->with('success', "Tipe Kulit $tipe_kulit->nama berhasil dihapus!");
    }
}
