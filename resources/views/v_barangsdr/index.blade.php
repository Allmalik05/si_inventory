@extends('layouts.adm-main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('barangseed.create') }}" class="btn btn-md btn-success mb-3">TAMBAH BARANG</a>
                        @if(session('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger mt-3">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                </div>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>MERK</th>
                            <th>SERI</th>
                            <!-- <th>SPESIFIKASI</th> -->
                            <th>STOK</th>
                            <th>KATEGORI</th>
                            <th style="width: 15%">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($barangSeed as $rowbarang)
                            <tr>
                                <td>{{ $rowbarang->id  }}</td>
                                <td>{{ $rowbarang->merk  }}</td>
                                <td>{{ $rowbarang->seri  }}</td>
                                <!-- <td>{{ $rowbarang->spesifikasi  }}</td> -->
                                <td>{{ $rowbarang->stok  }}</td>
                                <td>{{ $rowbarang->kategori->deskripsi }}</td>
                                <td class="text-center"> 
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('barangseed.destroy', $rowbarang->id) }}" method="POST">
                                        <a href="{{ route('barangseed.show', $rowbarang->id) }}" class="btn btn-sm btn-dark"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('barangseed.edit', $rowbarang->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil-alt"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                                
                            </tr>
                        @empty
                            <div class="alert">
                                Data Barang belum tersedia
                            </div>
                        @endforelse
                    </tbody>
                    
                </table>
                <!-- {{-- {{ $barang->links() }} --}} -->

            </div>
        </div>
    </div>
@endsection