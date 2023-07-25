@extends('adminlte::page')

@section('title', 'Tambah Kupon')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Kupon</h1>
@stop

@section('content')
    <form action="{{ route('kupon.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="nama_kupon">Nama Kupon</label>
                            <input type="text" class="form-control @error('nama_kupon') is-invalid @enderror" id="nama_kupon" placeholder="Nama Kupon" name="nama_kupon" value="{{ old('nama_kupon') }}">
                            @error('nama_kupon') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" placeholder="Deskripsi" name="deskripsi">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="wahana_id">Pilih Wahana</label>
                            <select class="form-control @error('wahana_id') is-invalid @enderror" id="wahana_id" name="wahana_id">
                                <option value="">-- Pilih Wahana --</option>
                                @foreach($wahana as $item)
                                    <option value="{{ $item->id }}" @if(old('wahana_id') == $item->id) selected @endif>{{ $item->nama_wahana }}</option>
                                @endforeach
                            </select>
                            @error('wahana_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                       
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('kupon.index') }}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
