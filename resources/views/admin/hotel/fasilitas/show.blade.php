@extends('layouts.master')

@section('content')
<a href="{{route('fasilitas-hotel.index')}}" class="btn btn-success">Kembali</a>
<div class="card">
    <div class="card-header">
        <h6>Detail Fasilitas Hotel</h6>
        <button class="btn bg-gradient-success">{{($data->status == 1)? 'Tersedia' : 'Tidak Tersedia'}}</button>
        <a href="{{route('fasilitas-hotel.edit', $data->id)}}" class="btn btn-primary">Edit</a>
    </div>
    <div class="card-body">
        <img src="{{Storage::url($data->foto)}}" alt="" class="img-thumbnail" width="30%">
        <div class="form-group">
            <label for="" class="form-label">Nama Fasilitas</label>
            <input type="text" name="fasilitas" id="" class="form-control" readonly value="{{$data->fasilitas}}">
        </div>
        <div class="form-group">
            <label for="" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="" cols="3" rows="3" class="form-control" readonly>{{$data->deskripsi}}</textarea>
        </div>
    </div>
</div>
@endsection
