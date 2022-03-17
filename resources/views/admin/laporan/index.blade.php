@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Laporan</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <form action="{{route('laporan.index')}}" method="get">
                @csrf
            <div class="row m-0">
                <div class="col-2">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                        <input type="date" name="minDate" id="" class="form-control">
                    </div>
                </div>
                <div class="col-2">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                        <input type="date" name="maxDate" id="" class="form-control">
                    </div>
                </div>
                <div class="col-2">
                    <button class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>
            <div class="row m-0">
                <div class="col-3">
                    <form action="{{route('laporan.index')}}" method="get">
                        @csrf
                    <div class="form-group row">

                        <div class="col-8">
                            <select name="status_pembayaran" id="" class="form-control">
                                <option value="null" selected>Pilih Status Pembayaran</option>
                                <option value="0">Belum dibayar</option>
                                <option value="1">Sudah dibayar</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <button class=" btn btn-primary">Filter</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <div class="row m-0">
                <div class="col-3">
                    <form action="{{route('laporan.index')}}" method="get">
                        @csrf
                    <div class="form-group row">
                        <div class="col-8">
                            <select name="status_kamar" id="" class="form-control">
                                <option value="null" selected>Pilih Status Kamar</option>
                                <option value="0">Belum terkonfirmasi</option>
                                <option value="1">Check-out</option>
                                <option value="2">Check-in</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <button class=" btn btn-primary">Filter</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
            <hr>
            <table class="table" id="laporan-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode Booking</th>
                        <th>Nama Tamu</th>
                        <th>Tanggal Booking</th>
                        <th>Status Pembayaran</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->kode_booking}}</td>
                        <td>{{$item->nama_tamu}}</td>
                        <td>{{$item->created_at->format('d/m/Y')}}</td>
                        <td>
                            @if ($item->status_pembayaran == 0)
                            <div class="btn bg-gradient-danger">Belum dibayar</div>
                            @else
                            <div class="btn bg-gradient-success">Sudah dibayar</div>
                            @endif
                        </td>
                        <td>
                            @if ($item->status_kamar == 0)
                            <div class="btn bg-gradient-secondary">Belum terkonfirmasi</div>
                            @elseif($item->status_kamar == 1)
                            <div class="btn bg-gradient-danger">Check-out</div>
                            @else
                            <div class="btn bg-gradient-success">Check-in</div>
                            @endif
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
    $(document).ready(function () {
        $('#laporan-table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'pdf', 'print'
            ],
            pageLength : 5,
            lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
        });
    });

</script>
@endpush
