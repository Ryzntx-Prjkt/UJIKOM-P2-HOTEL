@extends('layouts.master')

@section('content')
<a href="{{route('akun.index')}}" class="btn btn-success">Kembali</a>
<div class="card">
    <div class="card-header">
        <h6>Tambah Akun</h6>
    </div>
    <form action="{{route('akun.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" name="name" id="name" class="form-control" required autofocus
                    value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" required autocomplete="email" autofocus
                    value="{{ old('email') }}">
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required autofocus
                            autocomplete="current-password">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="c_password" class="form-label">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" id="c_password" class="form-control"
                            required autofocus>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="no_telp" class="form-label">No Telp</label>
                <input type="number" name="no_telp" id="no_telp" class="form-control" required autofocus
                    value="{{ old('no_telp') }}">
            </div>
            <div class="form-group">
                <label for="stock" class="form-label">Role</label>
                <select name="role" id="role" class="form-select select2" required value="{{ old('role') }}">
                    <option value="admin">Admin</option>
                    <option value="resepsionis">Resepsionis</option>
                </select>
            </div>
            <div class="form-group">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" name="foto" id="foto" class="form-control">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>

    </form>
</div>
@endsection
