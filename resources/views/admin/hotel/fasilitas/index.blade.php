@extends('layouts.master')

@section('content')
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#fasilitas-modal">Tambah Fasilitas</button>
<div class="card mb-4 pb-4">
    <div class="card-header pb-0">
        <h6>Data Fasilitas Hotel</h6>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0 ">
                <thead>
                    <tr>
                        <th
                            class="col-1 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 align-middle text-center">
                            #</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                Fasilitas Hotel</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 align-middle text-center">
                            Status</th>
                        <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td class="align-middle text-center text-sm" scoop="row">{{$loop->iteration}}</td>
                            <td>
                                <div class="d-flex px-2 py-1 align-middle text-center">
                                    <div>
                                            <img src="{{ Storage::url($item->foto)}}"
                                    class="avatar avatar-xl me-3" alt="user1">
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{$item->fasilitas}}</h6>
                                </div>
                            </td>
                        </td>
                            <td class="align-middle text-center">
                                <h6 class="mb-0 text-sm">{{$item->status}}</h6>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-2">
                                            <a href="{{route('kamar.show', $item->id)}}" class="btn btn-primary "><li class="fa fa-eye"></li></a>
                                        </div>
                                <form action="{{route('fasilitas-hotel.destroy', $item->id)}}" class="col-1" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="fasilitas-modal" tabindex="-1" aria-labelledby="fasilitas-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fasilitas-modalLabel">Tambah Fasilitas Hotel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('fasilitas-hotel.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="fasilitas" class="form-label">Nama Fasilitas</label>
                        <input type="text" name="fasilitas" id="fasilitas" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="foto" class="form-label">Foto Fasilitas</label>
                        <input type="file" name="foto" id="foto" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="fasilitas" class="form-label">Deskripsi Fasilitas</label>
                        <textarea name="deskripsi" id="" cols="3" rows="3" class="form-control"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
