@extends('layouts.master')

@section('content')
<a href="{{route('fasilitas-hotel.index')}}" class="btn btn-success">Kembali</a>
<div class="card">
    <div class="card-header">
        <h6>Edit Fasilitas Hotel</h6>
    </div>
    <form action="{{route('fasilitas-hotel.update', $data->id)}}" method="post">
        @method('put')
        @csrf
        <div class="card-body">
            <img src="{{Storage::url($data->foto)}}" alt="" class="img-thumbnail" width="30%">
            <div class="form-group">
                <label for="" class="form-label">Nama Fasilitas</label>
                <input type="text" name="fasilitas" id="" class="form-control" required value="{{$data->fasilitas}}">
            </div>
            <div class="form-group">
                <label for="foto" class="form-label">Foto Fasilitas</label>
                <input type="file" name="foto" id="foto" class="form-control">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" id="" cols="3" rows="3" class="form-control"
                    required>{{$data->deskripsi}}</textarea>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn bg-gradient-success">Perbarui</button>
        </div>
    </form>
</div>
@endsection
