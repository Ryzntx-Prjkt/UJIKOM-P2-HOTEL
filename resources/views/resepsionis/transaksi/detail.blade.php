@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Data Booking</h5>
            <div class="form-group col-1">
                <label for="" class="form-label">Kode Booking</label>
                <input type="text" name="" id="" class="form-control" value="{{$booking->kode_booking}}" readonly>
            </div>
        </div>
        <div class="card-body py-0">
            <div class="form-group">
                <label for="" class="form-label">Nama Reservasi</label>
                <input type="text" name="" id="" class="form-control" value="{{$booking->nama_tamu}}" readonly>
            </div>
            <div class="form-group">
                <label for="" class="form-label">Tipe Kamar</label>
                <input type="text" name="" id="" class="form-control" value="{{$booking['kamar']->tipe_kamar}}" readonly>
            </div>
            <div class="form-group">
                <label for="" class="form-label">Banyak Kamar yang dipesan</label>
                <input type="text" name="" id="" class="form-control" value="{{$booking->jumlah_kamar}}" readonly>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="" class="form-label">Check-in</label>
                        <input type="date" name="check_in" id="" class="form-control" value="{{$booking->tgl_checkin}}" readonly>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="" class="form-label">Check-out</label>
                        <input type="date" name="check_out" id="" class="form-control" value="{{$booking->tgl_checkout}}" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#transaksiModal">Bayar</button>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="transaksiModal" tabindex="-1" aria-labelledby="transaksiModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="transaksiModalLabel">Pembayaran Transaksi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('booking_update', $booking->id)}}" method="post">
            @method('put')
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="" class="form-label">Total yang harus dibayar</label>
                    <input type="text" name="" id="total_dibayar" class="form-control" value="{{$booking->total_harga}}" readonly>
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Uang yang diterima</label>
                    <input type="text" name="" id="input_uang" class="form-control"  required>
                    <small>Uang harus dihitung dengan cermat!</small>
                </div>
                <h5 id="kembalian">Kembalian</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Perbarui transaksi & cetak</button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@push('addon-script')
    <script>
        $(document).ready(function(){
            $('#input_uang').change(function(){
                var hasil = $('#input_uang').val() - $('#total_dibayar').val();
                $('#kembalian').html("Kembalian: " + hasil);
            });
        });
    </script>
@endpush
