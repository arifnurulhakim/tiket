@extends('adminlte::page')

@section('title', 'Tambah Galeri')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Galeri</h1>
@stop

@section('content')
    <form action="{{route('galeri.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="nama_foto">Nama Foto</label>
                            <input type="text" class="form-control @error('nama_foto') is-invalid @enderror" id="nama_foto" placeholder="Nama Galeri" name="nama_foto" value="{{old('nama_foto')}}">
                            @error('nama_foto') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" placeholder="Deskripsi" name="deskripsi">{{old('deskripsi')}}</textarea>
                            @error('deskripsi') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                       
                        <div class="form-group">
                            <label for="foto_galeri">Foto Galeri</label>
                            <input type="file" class="form-control-file @error('foto_galeri') is-invalid @enderror" id="foto_galeri" name="foto_galeri">
                            @error('foto_galeri') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('galeri.index')}}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
@stop
