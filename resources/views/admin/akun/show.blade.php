@extends('layouts.master')

@section('content')
<a href="{{route('akun.index')}}" class="btn btn-success">Kembali</a>
<div class="card">
    <div class="card-header">
        <div class="row justify-content-between">
            <h6>Detail Akun</h6>
            <div class="col-4 col-sm-4 col-xl-4 row">
                <div class="col-9 col-sm-5 col-md-4 col-lg-4 col-xl-3 col-xxl-2">
                    <a href="{{route('akun.edit', $data->id)}}" class="btn btn-primary">Edit</a>
                </div>
                <div class="col-1">
                    <form action="{{route('akun.destroy', $data->id)}}" class="" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Yakin untuk hapus data ini?')">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="form-group">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" name="name" id="name" class="form-control" required autofocus value="{{ $data->name }}" readonly>
        </div>
        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required autocomplete="email" autofocus readonly
                value="{{ $data->email }}">
        </div>
        <div class="form-group">
            <label for="no_telp" class="form-label">No Telp</label>
            <input type="number" name="no_telp" id="no_telp" class="form-control" required autofocus readonly
                value="{{ $data->no_telp }}">
        </div>
        <div class="form-group">
            <label for="role" class="form-label">Role</label>
            <input type="text" name="role" id="role" class="form-control" required autofocus readonly
                value="{{ $data->role }}">
        </div>

    </div>



</div>
@endsection
