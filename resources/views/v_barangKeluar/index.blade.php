@extends('layouts.adm-main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Barang Keluar</h2>
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('barangkeluar.create') }}" class="btn btn-md btn-success mb-3">TAMBAH BARANG</a>
                    </div>
                </div>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>DATE</th>
                            <th>QTY_KELUAR</th>
                            <th>BARANG</th>
                            <th style="width: 15%">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($datakeluar as $data)
                            <tr>
                                <td>{{ $data->id  }}</td>
                                <td>{{ $data->tgl_keluar  }}</td>
                                <td>{{ $data->qty_keluar  }}</td>
                                <td>{{ $data->barang->merk }} - {{ $data->barang->seri }} </td>
                                <td class="text-center"> 
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('barangkeluar.destroy', $data->id) }}" method="POST">
                                        <a href="{{ route('barangkeluar.show', $data->id) }}" class="btn btn-sm btn-dark"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('barangkeluar.edit', $data->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil-alt"></i></a>
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