@extends('layouts.master')

@section('content')
    <a href="{{route('kamar.show', $data->id)}}" class="btn btn-success">Kembali</a>
    <div class="card">
        <div class="card-header">
            <h6>Edit Data Kamar</h6>
        </div>
        <form action="{{route('kamar.update', $data->id)}}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="tipe_kamar" class="form-label">Tipe Kamar</label>
                    <input type="text" name="tipe_kamar" id="tipe_kamar" class="form-control" required value="{{$data->tipe_kamar}}">
                </div>
                <div class="form-group">
                    <label for="harga" class="form-label">Harga Kamar</label>
                    <input type="number" name="harga" id="harga" class="form-control" required value="{{$data->harga}}">
                </div>
                <div class="form-group">
                    <label for="stock" class="form-label">Stok Kamar</label>
                    <input type="number" name="stock" id="stock" class="form-control" required value="{{$data->stock}}">
                </div>
                <div class="form-group">
                    <label for="foto" class="form-label">Foto Kamar</label>
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection
