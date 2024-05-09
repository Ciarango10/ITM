<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="{{ asset('theme/img/favicon.png') }}" rel="icon">
        <link href="{{ asset('theme/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="{{ asset('theme/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('theme/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('theme/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('theme/vendor/quill/quill.snow.css') }}" rel="stylesheet">
        <link href="{{ asset('theme/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
        <link href="{{ asset('theme/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
        <link href="{{ asset('theme/vendor/simple-datatables/style.css') }}" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="{{ asset('theme/css/style.css') }}" rel="stylesheet">

        <!-- =======================================================
        * Template Name: NiceAdmin
        * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
        * Updated: Mar 17 2024 with Bootstrap v5.3.3
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->
    </head>

    <body>

        <main>
            <div class="container">

                <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                                <div class="d-flex justify-content-center py-4">
                                    <a href="{{ route('home.index') }}" class="logo d-flex align-items-center w-auto">
                                        <img src="{{ asset('theme/img/logo.png') }}" alt="">
                                        <span class="d-none d-lg-block">NiceAdmin</span>
                                    </a>
                                </div><!-- End Logo -->

                                <div class="card mb-3">

                                    <div class="card-body">

                                        <div class="pt-4 pb-2">
                                            <h5 class="card-title text-center pb-0 fs-4">Iniciar sesión</h5>
                                            <p class="text-center small">Ingrese su usuario y contraseña para acceder al sistema</p>
                                        </div>

                                        <form method="POST" action="{{ route('login') }}" class="row g-3" novalidate>
                                            @csrf
                                            <div class="col-12">
                                                <label for="name" class="form-label">Email</label>
                                                <div class="input-group has-validation">
                                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                    <input type="text" id="name" name="email" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label for="password" class="form-label">Contraseña</label>
                                                <input type="password" id="password" name="password" class="form-control" >
                                            </div>

                                            <div class="col-12">
                                                <button class="btn btn-primary w-100" type="submit">Iniciar sesión</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </section>

            </div>
        </main><!-- End #main -->

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @if ($errors->any())
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    html: '<ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>'
                });
            </script>
        @endif

        @if (session()->has('message'))
            <script>
                const message = @json(session('message'));
                Swal.fire({
                    icon: message.type,
                    title: message.content
                });
            </script>
        @endif

    </body>

</html>