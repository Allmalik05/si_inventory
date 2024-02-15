<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


// Barang model
// Author : mrantazy68
// Written: 2023 - PKK
// URL    : experimen.test
// ---------------------------------------------------------------------------

class Kategori extends Model
{
    use HasFactory;

    //setup nama tabel yang digunakan dalam model
    protected $table = 'kategori';

    //setup daftar field pada table kategori yang bisa CRUD interaksi user
    protected $fillable = ['deskripsi','kategori'];

    //method barang
    //merelasikan tabel kategori ke tabel barang (one to many)
    public function barang()
    {
        return $this->hasMany(Barangsder::class);
    }

    //method getKategoriAll()
    //query untuk mengakses seluruh record tabel kategori
    //query untuk memanggil store function ketKategori(), diberi nama field baru ketkategori
    public static function getKategoriAll(){
        return DB::table('kategori')
                    ->select('kategori.id','deskripsi','kategori',DB::raw('ketKategorik(kategori) as ketkategori'))->get();
    }

    //method katShowAll()
    //query untuk mengakses seluruh record tabel kategori
    //merelasikan dengan tabel barang
    // query untuk memanggil store function ketKategori(), diberi nama field baru ketkategori
    public static function katShowAll(){
        return DB::table('kategori')
                ->join('barangseeder','kategori.id','=','barangseeder.kategori_id')
                ->select('kategori.id','deskripsi',DB::raw('ketKategorik(kategori) as ketkategori'),
                         'barangseeder.merk');
                // ->pagination(1);
                // ->get();

    }

    //method showKategoriById()
    //query untuk mengakses seluruh record tabel kategori
    //merelasikan dengan tabel barang
    //query untuk memanggil store function ketKategori(), diberi nama field baru ketkategori
    //menggunakan kriteria kategori.id tertentu
    public static function showKategoriById($id){
        return DB::table('kategori')
                ->join('barangseeder','kategori.id','=','barangseeder.kategori_id')
                ->select('barangseeder.id','kategori.deskripsi',DB::raw('ketKategorik(kategori.kategori) as ketkategori'),
                         'barangseeder.merk','barangseeder.seri','barangseeder.spesifikasi','barangseeder.stok')
                ->get();

    }

    public static function getKategoriById($id){
        return DB::table('kategori')
                    ->select('kategori.id','deskripsi','kategori',DB::raw('ketKategorik(kategori) as ketkategori'))
                    ->where('kategori.id', $id) // menambahkan kondisi where untuk mencocokkan id
                    ->first();
    }

}