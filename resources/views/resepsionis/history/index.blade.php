@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h6>Daftar Transaksi Selesai</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table" id="booking">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode Booking</th>
                        <th>Nama Tamu</th>
                        <th>Tipe Kamar</th>
                        <th>Status Pembayaran</th>
                        <th>Status Kamar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($booking as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->kode_booking}}</td>
                        <td>{{$item->nama_tamu}}</td>
                        <td>{{$item['kamar']->tipe_kamar}}</td>
                        <td>
                            @if ($item->status_pembayaran == 1)
                            <button class="btn bg-gradient-success">Selesai</button>
                            @else
                            <button class="btn bg-gradient-danger">Belum dibayar</button>
                            @endif
                        </td>
                        <td class="col-1">
                            @if ($item->status_kamar == 1)
                            <button class="btn bg-gradient-success">Check-out</button>
                            @else
                            <select name="status_kamar" id="select_status" class="select-status form-select col-2"
                                data-id="{{$item->id}}" data-val="{{$item->status_kamar}}">
                                {{-- @foreach ($item->status_kamar as $status)
                                    <option value="{{$status}}" @selected(old($status) == $status)> {{$status}}
                                </option>
                                @endforeach --}}
                                @if ($item->status_kamar == 1)
                                <option value="1" selected>Check-out</option>
                                <option value="2">Check-in</option>
                                @else
                                <option value="1">Check-out</option>
                                <option value="2" selected>Check-in</option>
                                @endif
                            </select>
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
        $('#booking').DataTable();
    });

    $(document).on('change', '.select-status', function () {
        let id_booking = $(this).data('id');
        Swal.fire({
            title: 'Apakah kamu yakin?',
            text: "Mengubah status kamar pada booking ini?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#6777ef',
            cancelButtonColor: '#fb160a',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak',
        }).then((result) => {
            if (result.isConfirmed) {
                let val = $(this).val();
                axios.post('{{route('history_update')}}', {
                            id_booking: id_booking,
                            status_kamar: val
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

</script>
@endpush
