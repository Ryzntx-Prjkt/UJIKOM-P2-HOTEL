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

<body class="g-sidenav-show bg-gray-100">
    @include('layouts.welcome.sidebar')

    <main class="main-content position-relative border-radius-lg ps">
        <div class="container position-sticky z-index-sticky top-0">
            <div class="row">
                <div class="col-12">
                    <!-- Navbar -->
                    @include('layouts.welcome.navbar')
                    <!-- End Navbar -->
                </div>
            </div>
        </div>
        <section class="mt-7 m-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">List Booking</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode Booking</th>
                                    <th>Tipe Kamar</th>
                                    <th>Qty</th>
                                    <th>Tanggal Booking</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($booking as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->kode_booking}}</td>
                                    <td>{{$item['kamar']->tipe_kamar}}</td>
                                    <td>{{$item->jumlah_kamar}}</td>
                                    <td>{{$item->created_at->format('d M Y')}}</td>
                                    <td>
                                        @if ($item->status_pembayaran == 0)
                                        <button class="btn bg-gradient-danger">Belum Dibayar!</button>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-primary" id="lihat-booking" data-attr="{{route('booking_show', $item->id)}}" data-bs-toggle="modal"
                                            data-bs-target="#kodeBookingModal"><i class="fa fa-eye"></i></button>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </section>
    </main>
    <!-- Modal -->
    <div class="modal fade" id="kodeBookingModal" tabindex="-1" aria-labelledby="kodeBookingModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="kodeBookingModalLabel">Kode Booking
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <h6>Kode Booking</h6>
                    <h4 id="kode_booking">213190</h4>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <!--   Core JS Files   -->
    @include('auth.includes.scripts')

    <script>
        $(document).ready(function () {
            $('#lihat-booking').click(function (e) {
                e.preventDefault();
                let hrefs = $(this).attr('data-attr');
                axios.get(hrefs).then(function (response) {
                    // console.log(response);
                    $('#kode_booking').html(response.data.kode_booking);
                }).catch(function (error) {
                    console.log(error);
                });
            });
        });

    </script>

</body>

</html>
