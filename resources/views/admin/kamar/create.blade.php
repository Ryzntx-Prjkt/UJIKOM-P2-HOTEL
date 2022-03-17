@extends('layouts.master')

@section('content')
    <a href="{{route('kamar.index')}}" class="btn btn-success">Kembali</a>
    <div class="card">
        <div class="card-header">
            <h6>Tambah Data Kamar</h6>
        </div>
        <form action="{{route('kamar.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="tipe_kamar" class="form-label">Tipe Kamar</label>
                    <input type="text" name="tipe_kamar" id="tipe_kamar" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="harga" class="form-label">Harga Kamar</label>
                    <input type="number" name="harga" id="harga" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="stock" class="form-label">Stok Kamar</label>
                    <input type="number" name="stock" id="stock" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="foto" class="form-label">Foto Kamar</label>
                    <input type="file" name="foto" id="foto" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="foto" class="form-label">Deskripsi Kamar</label>
                    <textarea name="deskripsi" id="deskripsi" cols="3" rows="3" class="form-control"></textarea>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection

@push('addon-script')
    <script>
        $(document).ready(function () {
            $('#deskripsi').summernote({
                tabsize: 1,
                height: 100
            });
        });
    </script>
@endpush
