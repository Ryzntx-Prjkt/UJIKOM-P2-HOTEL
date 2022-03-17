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
                    <h4>Profile</h4>
                </div>
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-4 bg-gray-100 card shadow-card">
                            <div class="card-header bg-gray-100 text-center">
                                <img src="{{Storage::url(Auth::user()->foto)}}" alt="Foto Profil" class="img-fluid rounded-full">
                            </div>
                            <div class="card-body text-center">
                                <h4>{{Auth::user()->name}}</h4>
                                <h6>{{Auth::user()->email}}</h6>
                            </div>
                        </div>
                        <div class="col-xl-8 card bg-gray-100 shadow-card">
                            <form action="{{route('profile_update', Auth::user()->id)}}" method="post" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="card-header bg-gray-100">
                                    <h6>Edit Profile</h6>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Nama Lengkap</label>
                                        <input type="text" class="form-control" value="{{Auth::user()->name}}" required
                                            name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control" value="{{Auth::user()->email}}" required
                                            name="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="">No Telp</label>
                                        <input type="number" class="form-control" value="{{Auth::user()->no_telp}}" required
                                            name="no_telp">
                                    </div>
                                    <hr>
                                    <h5>Password area</h5>
                                    <div class="form-group">
                                        <label for="">Password Lama</label>
                                        <input type="password" class="form-control" name="old_password" autocomplete="old-password">
                                    </div>
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label for="">Password Baru</label>
                                            <input type="password" class="form-control" name="password" autocomplete="new-password">
                                        </div>
                                        <div class="col-6 form-group">
                                            <label for="">Konfirmasi Password</label>
                                            <input type="password" class="form-control" name="password_confirmation">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="">File Foto</label>
                                        <input type="file" class="form-control" name="foto">
                                        <small>.jpg, .jpeg, .png</small>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary">Perbarui!</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </section>
    </main>
    <!--   Core JS Files   -->
    @include('auth.includes.scripts')
    @include('sweetalert::alert')
</body>

</html>
