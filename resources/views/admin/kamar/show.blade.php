@extends('layouts.master')

@section('content')
<a href="{{route('kamar.index')}}" class="btn btn-success">Kembali</a>

<div class="row">
    <div class="col-lg-7 mb-lg-0 mb-4">
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-between">
                    <h6>Detail Data Kamar</h6>
                    <div class="col-8 col-sm-8 col-xl-4 row">
                        <div class="col-6 col-xs-2 col-sm-3 col-md-2 col-lg-3 col-xl-6 col-xxl-4">
                            <a href="{{route('kamar.edit', $data->id)}}" class="btn btn-primary">Edit</a>
                        </div>
                        <div class="col-1">
                            <form action="{{route('kamar.destroy', $data->id)}}" class="" method="post">
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
                <img src="{{Storage::url($data->foto)}}" class="img-fluid rounded align-middle" alt="" width="300">
                <hr class="horizontal">
                <div class="form-group">
                    <label for="tipe_kamar" class="form-label">Tipe Kamar</label>
                    <input type="text" name="tipe_kamar" id="tipe_kamar" class="form-control" required readonly
                        value="{{$data->tipe_kamar}}">
                </div>
                <div class="form-group">
                    <label for="harga" class="form-label">Harga Kamar</label>
                    <input type="number" name="harga" id="harga" class="form-control" required readonly
                        value="{{$data->harga}}">
                </div>
                <div class="form-group">
                    <label for="stock" class="form-label">Stok Kamar</label>
                    <input type="number" name="stock" id="stock" class="form-control" required readonly
                        value="{{$data->stock}}">
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="card">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-between">
                        <h6>Fasilitas Kamar</h6>
                        <div class="col-5 col-sm-5 col-xl-5 ">
                            <div class="col-9 col-sm-5 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#fasilitas-modal"><i class="fa fa-plus"></i></button>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-items-center">
                            <thead>
                                <tr>
                                    <th
                                        class="col-1 text-uppercase text-secondary text-xxs font-weight-bolder opacity-100 ps-2 align-middle text-center">
                                        #</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-100 ps-2 align-middle text-center">
                                        Nama Fasilitas</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-100 ps-2 align-middle text-center">
                                        Kategori</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-100 ps-2 align-middle text-center">
                                        Status</th>
                                    <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fasilitas as $item)
                                <tr>
                                    <td class="align-middle text-center text-sm" scoop="row">
                                        {{$loop->iteration}}</td>
                                    <td class="align-middle text-center">
                                        <h6 class="mb-0 text-sm">{{$item->fasilitas}}</h6>
                                    </td>
                                    <td class="align-middle text-center">
                                        <h6 class="mb-0 text-sm">{{$item->kategori}}</h6>
                                    </td>
                                    <td class="align-middle text-center">
                                        <select name="status" id="status" class="form-control select-status"
                                            data-id="{{$item->id}}" data-val="{{$item->status}}">
                                            @if ($item->status == 1)
                                            <option value="1" selected>Tersedia</option>
                                            <option value="0">Tidak tersedia</option>
                                            @else
                                            <option value="1">Tersedia</option>
                                            <option value="0" selected>Tidak tersedia</option>
                                            @endif
                                        </select>
                                    </td>
                                    <td>
                                        <form action="{{route('fasilitas-destroy', $item->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-xs"
                                                onclick="return confirm('Yakin untuk hapus fasilitas ini?')"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="fasilitas-modal" tabindex="-1" aria-labelledby="fasilitas-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fasilitas-modalLabel">Tambah Fasilitas Kamar {{$data->tipe_kamar}}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('fasilitas-store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="text" name="id" id="" hidden value="{{$data->id}}">
                    <div class="form-group">
                        <label for="" class="form-label">Nama Fasilitas</label>
                        <input type="text" name="fasilitas" id="" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Kategori Fasilitas</label>
                        <input type="text" name="kategori" id="" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Foto Fasilitas</label>
                        <input type="file" name="foto" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Deskripsi</label>
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

@push('addon-script')
<script>
    $(document).ready(function () {
        $(document).on('change', '.select-status', function () {
            let id_fasilitas = $(this).data('id');
            console.log(id_fasilitas);
            Swal.fire({
                title: 'Ubah status fasilitas',
                text: "Yakin untuk mengubah status fasilitas?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
            }).then((result) => {
                if (result.isConfirmed) {
                    let val = $(this).val();
                    axios.post('{{route('fasilitas-update')}}', {
                                id_fasilitas: id_fasilitas,
                                status: val
                            })
                        .then(function (response) {
                            iziToast.success({
                                title: 'Berhasil!',
                                message: 'Status berhasil diperbarui!',
                                position: 'topRight'
                            });
                            this.output = response.data;
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                } else {
                    $(this).val($(this).data('val'));
                    return;
                }
            });
        });
    });

</script>
@endpush
