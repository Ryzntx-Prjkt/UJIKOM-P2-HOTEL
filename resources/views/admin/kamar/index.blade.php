@extends('layouts.master')

@section('content')
<a href="{{route('kamar.create')}}" class="btn btn-success">Tambah Data</a>
<div class="card mb-4 pb-4">
    <div class="card-header pb-0">
        <h6>Data Menu</h6>
    </div>
    <div class="card-body pt-0 pb-2">
        <div class="table-responsive">
            <table class="table align-items-center mb-0 " id="kamar">
                <thead>
                    <tr>
                        <th
                            class="col-1 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 align-middle text-center">
                            #</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 align-middle text-center">
                            Tipe Kamar</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 align-middle text-center">
                            Harga Kamar</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 align-middle text-center">
                            Stok Kamar</th>
                        <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td class="align-middle text-center text-sm" scoop="row">{{$loop->iteration}}</td>
                            <td class="align-middle text-center">
                                <h6 class="mb-0 text-sm">{{$item->tipe_kamar}}</h6>
                            </td>
                            <td class="align-middle text-center">
                                <span class="mb-0 text-sm">{{ "Rp " . number_format($item->harga, 2, ",", "."); }}</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="btn bg-gradient-success">{{$item->stock}}</span>
                            </td>
                            <td>
                                <a href="{{route('kamar.show', $item->id)}}" class="btn btn-primary"><li class="fa fa-eye"></li></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#kamar').DataTable();
        } );
    </script>
@endpush
