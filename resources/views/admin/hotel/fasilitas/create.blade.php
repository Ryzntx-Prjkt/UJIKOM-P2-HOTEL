@extends('layouts.master')

@section('content')
    <a href="{{route('fasilitas-hotel.index')}}" class="btn btn-success">Kembali</a>
    <div class="card">
        <div class="card-header">
            <h6>Tambah Fasilitas Hotel</h6>
        </div>
        <form action="{{route('fasilitas-hotel.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="tipe_kamar" class="form-label">Nama Fasilitas</label>
                    <input type="text" name="tipe_kamar" id="tipe_kamar" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="foto" class="form-label">Foto Fasilitas</label>
                    <input type="file" name="foto" id="foto" class="form-control" required>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection
