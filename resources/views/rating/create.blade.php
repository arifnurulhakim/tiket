@extends('adminlte::page')

@section('title', 'Tambah Wahana')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Wahana</h1>
@stop

@section('content')
    <form action="{{ route('wahana.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Existing form fields -->

                        <div class="form-group">
                            <label for="nama_wahana">Nama Wahana</label>
                            <input type="text" class="form-control @error('nama_wahana') is-invalid @enderror" id="nama_wahana" placeholder="Nama Wahana" name="nama_wahana" value="{{ old('nama_wahana') }}">
                            @error('nama_wahana') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" placeholder="Deskripsi" name="deskripsi">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                       
                        <div class="form-group">
                            <label for="foto_wahana">Foto Wahana</label>
                            <input type="file" class="form-control-file @error('foto_wahana') is-invalid @enderror" id="foto_wahana" name="foto_wahana">
                            @error('foto_wahana') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <!-- New fields: harga_weekday and harga_weekend -->
                        <div class="form-group">
                            <label for="harga_weekday">Harga Weekday</label>
                            <input type="number" class="form-control @error('harga_weekday') is-invalid @enderror" id="harga_weekday" placeholder="Harga Weekday" name="harga_weekday" value="{{ old('harga_weekday') }}" step="0.01">
                            @error('harga_weekday') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="harga_weekend">Harga Weekend</label>
                            <input type="number" class="form-control @error('harga_weekend') is-invalid @enderror" id="harga_weekend" placeholder="Harga Weekend" name="harga_weekend" value="{{ old('harga_weekend') }}" step="0.01">
                            @error('harga_weekend') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('wahana.index') }}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
