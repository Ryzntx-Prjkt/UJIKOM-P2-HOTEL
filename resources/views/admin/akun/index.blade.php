@extends('layouts.master')

@section('content')
<a href="{{route('akun.create')}}" class="btn btn-success">Tambah Data</a>
<div class="card mb-4 pb-4">
    <div class="card-header pb-0">
        <h6>Data Akun</h6>
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
                            Identitas</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                No Telp</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                            Fungsi</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Dibuat</th>
                        <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $item)
                    <tr>
                        <td class="align-middle text-center text-sm" scoop="row">{{$loop->iteration}}</td>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div>
                                    <img src="{{ Storage::url($item->foto)}}"
                            class="avatar avatar-xl me-3" alt="user1">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{{$item->name}}</h6>
                                <p class="text-xs text-secondary mb-0">{{$item->email}}</p>
                            </div>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">{{$item->no_telp}}</p>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">{{$item->role}}</p>
                        </td>
                        <td class="align-middle text-center">
                            <span
                                class="text-secondary text-xs font-weight-bold">{{$item->created_at->format('D M Y')}}</span>
                        </td>
                        <td>
                            <a href="{{route('akun.show', $item->id)}}" class="btn btn-primary"><li class="fa fa-eye"></li></a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
