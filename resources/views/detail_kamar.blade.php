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
            <div class="p-5 mb-4 rounded-3 text-white" style="background: url({{Storage::url($kamar->foto)}}) no-repeat center fixed; background-size: cover; ">
                <div class="container-fluid py-8">
                    <h1 class="display-5 fw-bold text-white">{{$kamar->tipe_kamar}} Room</h1>
                    <p class="col-md-8 fs-4">{{$kamar->deskripsi}}</p>
                        <p class="card-text">{{ "Rp " . number_format($kamar->harga, 2, ",", "."); }}</p>
                        <button type="button"
                            class="btn @if($kamar->stock >= 1) bg-gradient-success @else bg-gradient-danger @endif">
                            @if ($kamar->stock >= 3)
                            Masih tersedia!
                            @elseif($kamar->stock >= 1 && $kamar->stock <= 2)
                            Stock kamar terbatas
                            @else
                            Sudah tidak tersedia!
                            @endif
                        </button>
                        @if ($kamar->stock >= 1)
                        <a href="{{route('book_kamar', $kamar->id)}}" class="btn btn-primary">Book sekarang!</a>
                        @else

                        @endif
                </div>
            </div>
            <div class="container">
                <h3 class="text-center mt-3">Fasilitas Kamar</h3>

                <div class="card-group">
                    @foreach ($fasilitas as $item)
                    <div class="card col-6">
                        <img src="{{Storage::url($item->foto)}}" class="card-img-top rounded-3 p-2" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">{{$item->fasilitas}}</h4>
                            <h6 class="card-title">{{$item->deskripsi}}</h6>
                            <button type="button"
                            class="btn @if($item->status >= 1) bg-gradient-success @else bg-gradient-danger @endif">
                            @if ($item->status >= 1)
                            Tersedia!
                            @else
                            Tidak tersedia!
                            @endif
                        </button>
                        </div>
                    </div>
                    @endforeach
                </div>


            </div>

        </section>
    </main>
    <!--   Core JS Files   -->
    @include('auth.includes.scripts')
</body>

</html>
