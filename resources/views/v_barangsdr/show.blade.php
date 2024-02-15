@extends('layouts.adm-main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
               <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td>MERK</td>
                                <td>{{ $barangSeed->merk }}</td>
                            </tr>
                            <tr>
                                <td>SERI</td>
                                <td>{{ $barangSeed->seri }}</td>
                            </tr>
                            <tr>
                                <td>SPESIFIKASI</td>
                                <td>{{ $barangSeed->spesifikasi }}</td>
                            </tr>
                            <tr>
                                <td>STOK</td>
                                <td>{{ $barangSeed->stok }}</td>
                            </tr>
                            <tr>
                                <td>KATEGORI</td>
                                <td>{{ $barangSeed->kategori->deskripsi }}</td>
                            </tr>
                        </table>
                    </div>
               </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12  text-right">
                <a href="{{ route('barangseed.index') }}" class="btn btn-md btn-primary mb-3">Back</a>
            </div>
        </div>
    </div>
@endsection