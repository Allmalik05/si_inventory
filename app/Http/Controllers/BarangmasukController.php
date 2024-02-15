<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangMasuk;
use App\Models\Barangsder;

class BarangmasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datamasuk = BarangMasuk::all();
        return view('v_barangMasuk.index', compact('datamasuk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rsetBarang = Barangsder::all();
        return view('v_barangMasuk.create', compact('rsetBarang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi input
        $request->validate([
            'tgl_masuk' => 'required|date',
            'qty_masuk' =>'required|numeric',
            'barang_id' => 'required|exists:kategori,id'
        ]);

        // simpan data barang
        BarangMasuk::create([
            'tgl_masuk' => $request->tgl_masuk,
            'qty_masuk' => $request->qty_masuk,
            'barang_id' => $request->barang_id
        ]);

        return redirect()->route('barangmasuk.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $datamasuk = BarangMasuk::find($id);
        return view('v_barangMasuk.show', compact('datamasuk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $datamasuk = BarangMasuk::findOrFail($id);
        $rsetBarang = Barangsder::all();
        return view('v_barangMasuk.edit', compact('datamasuk', 'rsetBarang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validasi input
        $request->validate([
            'tgl_masuk' => 'required|date',
            'qty_masuk' =>'required|numeric'
        ]);

        // Update data barang
        $datamasuk = BarangMasuk::findOrFail($id);
        $datamasuk->update([
            'tgl_masuk' => $request->tgl_masuk,
            'qty_masuk' => $request->qty_masuk
        ]);
        return redirect()->route('barangmasuk.index')->with('success', 'Barang berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $datamasuk = BarangMasuk::find($id);

        //delete post
        $datamasuk->delete();

        //redirect to index
        return redirect()->route('barangmasuk.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}