@extends('adminlte::page')

@section('title', 'Tambah Fasilitas')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Fasilitas</h1>
@stop

@section('content')
    <form action="{{route('fasilitas.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="nama_fasilitas">Nama Fasilitas</label>
                            <input type="text" class="form-control @error('nama_fasilitas') is-invalid @enderror" id="nama_fasilitas" placeholder="Nama Fasilitas" name="nama_fasilitas" value="{{old('nama_fasilitas')}}">
                            @error('nama_fasilitas') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" placeholder="Deskripsi" name="deskripsi">{{old('deskripsi')}}</textarea>
                            @error('deskripsi') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                       
                        <div class="form-group">
                            <label for="foto_fasilitas">Foto Fasilitas</label>
                            <input type="file" class="form-control-file @error('foto_fasilitas') is-invalid @enderror" id="foto_fasilitas" name="foto_fasilitas">
                            @error('foto_fasilitas') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('fasilitas.index')}}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
@stop
