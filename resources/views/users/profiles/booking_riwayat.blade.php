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
                    <h5 class="card-title">Riwayat Booking</h5>
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
                                        @if ($item->status_kamar == 0)
                                            <button class="btn bg-gradient-danger">Check-out</button>
                                            @else
                                            <button class="btn bg-gradient-success">Check-in</button>
                                        @endif
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
    <!--   Core JS Files   -->
    @include('auth.includes.scripts')

</body>

</html>
