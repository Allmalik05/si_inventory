<?php

namespace App\Http\Controllers;

use App\Models\Barangsder;
use App\Models\Kategori;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangseedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangSeed = Barangsder::orderBy('id', 'asc')->get();        
        return view('v_barangsdr.index',compact('barangSeed'));
    }

    public function create()
    {
        $rsetKategori = Kategori::all();
        return view('v_barangsdr.create', compact('rsetKategori'));
    }

    public function store(Request $request)
    {
        //validasi input
        $request->validate([
            'merk' => 'required|string|max:50',
            'seri' =>'required|string|max:50',
            'spesifikasi' => 'nullable|string',
            'kategori_id' => 'required|exists:kategori,id'
        ]);

        // simpan data barang
        Barangsder::create([
            'merk' => $request->merk,
            'seri' => $request->seri,
            'spesifikasi' => $request->spesifikasi,
            'kategori_id' => $request->kategori_id
        ]);

        return redirect()->route('barangseed.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id)
    {
        $barangSeed = Barangsder::find($id);    
        return view('v_barangsdr.show',compact('barangSeed'));
    }

    public function edit(string $id)
    {
        $barangSeed = Barangsder::findOrFail($id);
        $rsetKategori = Kategori::all();
        return view('v_barangsdr.edit', compact('barangSeed', 'rsetKategori'));

    }

    public function update(Request $request, string $id)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'merk' => 'required|string|max:50',
            'seri' => 'required|string|max:50',
            'spesifikasi' => 'nullable|string',
            'kategori_id' => 'required|exists:kategori,id',
        ]);

        // Update data barang
        $barangSeed = Barangsder::findOrFail($id);
        $barangSeed->update([
            'merk' => $request->merk,
            'seri' => $request->seri,
            'spesifikasi' => $request->spesifikasi,
            'kategori_id' => $request->kategori_id,
        ]);
        return redirect()->route('barangseed.index')->with('success', 'Barang berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        // Cek apakah ada transaksi barang keluar terkait dengan barang
        $barangMasukTerkait = BarangMasuk::where('barang_id', $id)->exists();
        // Cek apakah ada transaksi barang keluar terkait dengan barang
        $barangKeluarTerkait = Barangkeluar::where('barang_id', $id)->exists();
    
        // Cek apakah stok barang tidak nol
        $stokBarang = Barangsder::where('id', $id)->where('stok', '>', 0)->exists();
    
        if ($barangMasukTerkait || $barangKeluarTerkait || $stokBarang) {
            return redirect()->route('barangseed.index')->with(['error' => 'Barang tidak dapat dihapus karena terkait dengan transaksi atau masih memiliki stok.']);
        } else {
            // Hapus barang jika tidak terkait dengan transaksi dan stoknya nol
            $barangSeed = Barangsder::find($id);
            $barangSeed->delete();
    
            return redirect()->route('barangseed.index')->with(['success' => 'Barang berhasil dihapus.']);
        }
    }
}
