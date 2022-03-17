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
            <div class="p-5 mb-4 bg-light rounded-3">
                <div class="container-fluid py-8">
                    <h1 class="display-5 fw-bold">Custom jumbotron</h1>
                    <p class="col-md-8 fs-4">Using a series of utilities, you can create this jumbotron, just like
                        the one in previous versions of Bootstrap. Check out the examples below for how you can
                        remix and restyle it to your liking.</p>
                    <a href="#kamar" class="btn btn-primary btn-lg">Lihat Kamar</a>
                </div>
            </div>
            <div class="p-5 py-8 align-middle text-center" id="kamar">
                <h2>Kamar</h2>
                <div class="card-group">
                    @foreach ($kamar as $item)
                    <div class="card col-6">
                        <img src="{{Storage::url($item->foto)}}" class="card-img-top rounded-3 p-2" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$item->tipe_kamar}}</h5>
                            <p class="card-text">{{ "Rp " . number_format($item->harga, 2, ",", "."); }}</p>
                            <a href="{{route('detail_kamar', $item->id)}}" class="btn btn-primary btn-block">Booking!</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="p-5">
                <h2 class="py-2">Fasilitas Hotel</h2>
                <div class="card-group">
                    @foreach ($fasilitas as $item)
                    <div class="card col-6">

                        <img src="{{Storage::url($item->foto)}}" class="img-fluid card-img-top rounded-3" alt="..."
                            width="100">

                        <div class="card-body">
                            <h4 class="card-title">{{$item->fasilitas}}</h4>
                            <h6 class="card-title">{{$item->deskripsi}}</h6>
                            {{-- <a href="#" class="btn btn-primary btn-block">Booking!</a> --}}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>


        </section>
    </main>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }

    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/argon-dashboard.min.js?v=2.0.0"></script>
</body>

</html>
