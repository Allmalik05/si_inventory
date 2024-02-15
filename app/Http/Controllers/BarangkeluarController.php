<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangKeluar;
use App\Models\Barangsder;

class BarangkeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datakeluar = Barangkeluar::all();
        return view('v_barangKeluar.index', compact('datakeluar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rsetBarang = Barangsder::all();
        return view('v_barangKeluar.create', compact('rsetBarang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi input
        $request->validate([
            'tgl_keluar' => 'required|date',
            'qty_keluar' =>'required|numeric',
            'barang_id' => 'required|exists:kategori,id'
        ]);

        // simpan data barang
        BarangKeluar::create([
            'tgl_keluar' => $request->tgl_keluar,
            'qty_keluar' => $request->qty_keluar,
            'barang_id' => $request->barang_id
        ]);

        return redirect()->route('barangkeluar.index')->with(['success' => 'Data Berhasil Disimpan!']);
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $datakeluar = Barangkeluar::find($id);
        return view('v_barangKeluar.show', compact('datakeluar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $datakeluar = BarangKeluar::findOrFail($id);
        $rsetBarang = Barangsder::all();
        return view('v_barangKeluar.edit', compact('datakeluar', 'rsetBarang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validasi input
        $request->validate([
            'tgl_keluar' => 'required|date',
            'qty_keluar' =>'required|numeric'
        ]);

        // Update data barang
        $datakeluar = BarangKeluar::findOrFail($id);
        $datakeluar->update([
            'tgl_keluar' => $request->tgl_keluar,
            'qty_keluar' => $request->qty_keluar
        ]);
        return redirect()->route('barangkeluar.index')->with('success', 'Barang berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $datakeluar = BarangKeluar::find($id);

        //delete post
        $datakeluar->delete();

        //redirect to index
        return redirect()->route('barangkeluar.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
