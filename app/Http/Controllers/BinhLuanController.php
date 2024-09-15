<?php

namespace App\Http\Controllers;

use App\Models\BinhLuan;
use Illuminate\Http\Request;

class BinhLuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $binhLuans = BinhLuan::all();
        return view('admin.binh-luan.index', compact('binhLuans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
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
    public function show( $id)
    {
        $binhLuan = BinhLuan::find($id);

        if (!$binhLuan) {
            abort(404, 'Binh luan not found');
        }
        return view('admin.binh-luan.detail', compact('binhLuan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BinhLuan $binhLuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BinhLuan $binhLuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BinhLuan $binhLuan)
    {
        //
    }
}
