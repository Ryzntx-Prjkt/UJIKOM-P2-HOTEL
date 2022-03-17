<!--
=========================================================
* Argon Dashboard 2 - v2.0.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Argon Dashboard 2 by Creative Tim
    </title>
    @include('auth.includes.styles')
</head>

<body class="">
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <!-- Navbar -->
                @include('layouts.welcome.navbar')
                <!-- End Navbar -->
            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        <section>

            <div class="container py-8">
                <form action="{{route('booking.store')}}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h5>Booking Kamar</h5>
                            <div class="row col-2">
                                Kode Booking:
                                <input type="text" name="kode_booking" id="" value="{{$kode}}"
                                    class="form-control col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-xxl-2 " readonly>
                            </div>
                        </div>
                        <div class="card-body">
                            <input type="text" name="id_kamar" id="" class="form-control" required
                                    value="{{$kamar->id}}" hidden>
                            <div class="form-group">
                                <label for="" class="form-label">Nama Tamu</label>
                                <input type="text" name="nama_tamu" id="" class="form-control" required
                                    value="{{Auth::user()->name}}">
                                <small>Ubah jika nama pemesan tidak sesuai</small>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Tipe Kamar</label>
                                <input type="text" name="kamar" id="" class="form-control"
                                    value="{{$kamar->tipe_kamar}}" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Banyak Kamar yang dipesan</label>
                                <input type="number" name="jumlah_kamar" id="jumlah" class="form-control" required max="{{$kamar->stock}}" value="1">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="" class="form-label">Check-in</label>
                                        <input type="date" name="check_in" id="" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="" class="form-label">Check-out</label>
                                        <input type="date" name="check_out" id="" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Total Harga</label>
                                <input type="number" name="total_harga" id="harga" class="form-control" required
                                    value="{{$kamar->harga}}">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Booking & Print</button>
                        </div>
                    </div>
                </form>
            </div>

        </section>
    </main>
    <!--   Core JS Files   -->
    @include('auth.includes.scripts')

    <script>
        $(document).ready(function () {
            $('#jumlah').change(function () {
                var harga = {{$kamar -> harga}}
                $hasil = harga * $('#jumlah').val();
                $('#harga').val($hasil);
            });
        });

    </script>
</body>

</html>
