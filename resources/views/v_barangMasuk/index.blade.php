@extends('layouts.adm-main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Barang Masuk</h2>
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('barangmasuk.create') }}" class="btn btn-md btn-success mb-3">TAMBAH BARANG</a>
                    </div>
                </div>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>DATE</th>
                            <th>QTY_MASUK</th>
                            <th>BARANG</th>
                            <th style="width: 15%">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($datamasuk as $data)
                            <tr>
                                <td>{{ $data->id  }}</td>
                                <td>{{ $data->tgl_masuk  }}</td>
                                <td>{{ $data->qty_masuk  }}</td>
                                <td>{{ $data->barang->merk }} - {{ $data->barang->seri }} </td>
                                <td class="text-center"> 
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('barangmasuk.destroy', $data->id) }}" method="POST">
                                        <a href="{{ route('barangmasuk.show', $data->id) }}" class="btn btn-sm btn-dark"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('barangmasuk.edit', $data->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil-alt"></i></a>
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