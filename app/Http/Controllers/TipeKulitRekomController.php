<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TipeKulitRekomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = "Tipe Kulit Rekom";
        return (view('dashboardPage.tipe-kulit-rekom.index'))->with(compact('page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page = "Tipe Kulit Rekom";
        return (view('dashboardPage.tipe-kulit-rekom.show'))->with(compact('page'));
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
