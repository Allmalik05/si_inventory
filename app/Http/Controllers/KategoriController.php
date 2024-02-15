<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kategori;
use App\Models\Barangsdr;

class KategoriController extends Controller
{
    public function index()
    {
        $rsetKategori = Kategori::getKategoriAll();
        return view ('v_kategori.index',compact('rsetKategori'));
    }

    public function create()
    {
        $aKategori = array('blank'=>'Pilih Kategori',
                            'M'=>'Barang Modal',
                            'A'=>'Alat',
                            'BHP'=>'Bahan Habis Pakai',
                            'BTHP'=>'Bahan Tidak Habis Pakai'
                            );
        return view('v_kategori.create',compact('aKategori'));
    }

    public function store(Request $request)
    {
        // return $request->all();

        $this->validate($request, [
            'deskripsi'   => 'required',
            'kategori'     => 'required | in:M,A,BHP,BTHP',
        ]);


        //create post
        Kategori::create([
            'deskripsi'  => $request->deskripsi,
            'kategori' => $request->kategori
        ]);

        //redirect to index
        return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id)
    {
        $rsetKategori = Kategori::getKategoriById($id);
        return view('v_kategori.show', compact('rsetKategori'));
    }

    public function edit(string $id)
    {
        $rsetKategori = Kategori::findOrFail($id);
        return view('v_kategori.edit', compact('rsetKategori'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'deskripsi' => 'required',
            'kategori' => 'required | in:M,A,BHP,BTHP',
        ]);

        $rsetKategori = Kategori::findOrFail($id);
        $rsetKategori->update([
            'deskripsi'    => $request->deskripsi,
            'kategori'  => $request->kategori
        ]);

        return redirect()->route('kategori.index')->with('success', 'Item updated successfully');
    }

    public function destroy(string $id)
    {
        if (DB::table('barangseeder')->where('kategori_id', $id)->exists()){
            return redirect()->route('kategori.index')->with(['error' => 'Data Gagal Dihapus!']);
        } else {
            $rsetKategori = Kategori::find($id);
            $rsetKategori->delete();
            return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }
    }
}