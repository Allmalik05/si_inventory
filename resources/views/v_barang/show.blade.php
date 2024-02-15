@extends('layouts.adm-main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
               <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td>Nama</td>
                                <td>{{ $rsetBarang->nama }}</td>
                            </tr>
                            <tr>
                                <td>NIS</td>
                                <td>{{ $rsetBarang->spesifikasi }}</td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td>{{ $rsetBarang->kategori }}</td>
                            </tr>
                            <!-- <tr>
                                <td>Kelas</td>
                                <td>{{ $rsetBarang->foto }}</td>
                            </tr> -->
                        </table>
                    </div>
               </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ asset('storage/foto_barang/'.$rsetBarang->foto) }}" class="w-100 rounded">
                    </div>
                </div>
            </div>

        </div>
        <br>
        <div class="row">
            <div class="col-md-12  text-right">
                <a href="{{ route('barang.index') }}" class="btn btn-md btn-primary mb-3">Back</a>
            </div>
        </div>
    </div>
@endsection