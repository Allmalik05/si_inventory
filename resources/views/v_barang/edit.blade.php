@extends('layouts.adm-main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('barang.update',$rsetBarang->id) }}" method="POST" enctype="multipart/form-data">                    
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">NAMA LENGKAP</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama',$rsetBarang->nama) }}" placeholder="Masukkan Nama Barang">
                            
                                <!-- error message untuk nama -->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">NOMOR INDUK SISWA</label>
                                <input type="text" class="form-control @error('spesifikasi') is-invalid @enderror" name="spesifikasi" value="{{ old('spesifikasi',$rsetBarang->spesifikasi) }}" placeholder="Masukkan Spesifikasi">
                            
                                <!-- error message untuk nis -->
                                @error('spesifikasi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- <div class="form-group">
                                <label class="font-weight-bold">GENDER</label>
                                @if ($rsetBarang->kategori == 'M')
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="M" checked>
                                        <label class="form-check-label" for="gender">
                                            Laki-laki
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="F">
                                        <label class="form-check-label" for="gender">
                                            Perempuan
                                        </label>
                                    </div>

                                @else
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gender" value="M" >
                                    <label class="form-check-label" for="gender">
                                        Laki-laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gender" value="F" checked>
                                    <label class="form-check-label" for="gender">
                                        Perempuan
                                    </label>
                                </div>
                                @endif
                                
                                                         

                                <-- error message untuk nis -->
                                <!-- @error('kategori')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror -->
                            <!-- </div> -->

                            <div class="form-group">
                                <label class="font-weight-bold">Kategori</label>
                                
                                <div class="form-check">
                                   
                                    <select class="form-select" name="kategori" aria-label="Default select example">
                                        @foreach($aKategori as $key=>$val)
                                            @if($rsetBarang->kategori==$key)
                                                <option value="{{ $key }}" selected>{{ $val }}</option>
                                            @else
                                                <option value="{{ $key }}">{{ $val }}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                </div>
                                <!-- error message untuk kelas -->
                                @error('kategori')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <!-- <div class="form-group">
                                <label class="font-weight-bold">ROMBEL</label>
                                
                                @if($rsetBarang->rombel == 'A')
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rombel" id="rombel" value="A" checked>
                                        <label class="form-check-label" for="rombel">
                                            Rombel A
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rombel" id="rombel" value="B">
                                        <label class="form-check-label" for="rombel">
                                          Rombel B
                                        </label>
                                    </div>
                                @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rombel" id="rombel" value="A" >
                                        <label class="form-check-label" for="rombel">
                                            Rombel A
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rombel" id="rombel" value="B" checked>
                                        <label class="form-check-label" for="rombel">
                                        Rombel B
                                        </label>
                                    </div>
                                @endif -->


                                    
                                  

                                  

                                <!-- error message untuk rombel -->
                                <!-- @error('rombel')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> -->



                            
                            <div class="form-group">
                                <label class="font-weight-bold">FOTO</label>
                                <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto">
                            
                                <!-- error message untuk foto -->
                                @error('foto')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>

 

            </div>
        </div>
    </div>
@endsection