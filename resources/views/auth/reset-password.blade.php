<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Recover Password | PPGTM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets') }}/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets') }}/css/app.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="bg-primary bg-pattern">
    {{-- <div class="home-btn d-none d-sm-block">
        <a href="index.html"><i class="mdi mdi-home-variant h2 text-white"></i></a>
    </div> --}}

    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="p-2">
                                <h5 class="mb-3 text-center">Input Password Baru</h5>
                                <form action="{{ route('password.update') }}" method="POST">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-12">
                                            {{-- <div class="alert alert-warning alert-dismissible">
                                                Masukkan <b>Email</b> yang terdaftar dan ikuti intruksi yang dikirim!
                                            </div> --}}

                                            @if ($errors->any())
                                                <div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert"
                                                        aria-hidden="true">×</button>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach

                                                </div>
                                            @endif


                                            @if (session('status'))
                                                <div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert"
                                                        aria-hidden="true">×</button>
                                                    {{ session('status') }}
                                                </div>
                                            @endif

                                            <div class="form-group mt-4">
                                                <input type="hidden" class="form-control" name="token"
                                                    value="{{ request()->token }}">
                                                <input type="hidden" class="form-control" id="email" name="email"
                                                    value="{{ request()->email }}">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" id="password"
                                                    name="password">

                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="password_confirmation">Ulangi Password</label>
                                                <input type="password" class="form-control" id="password_confirmation"
                                                    name="password_confirmation">

                                            </div>
                                            <div class="mt-4">
                                                <button class="btn btn-success btn-block waves-effect waves-light"
                                                    type="submit">Reset Password</button>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                                <div class="row mt-5">
                                    <div class="col-sm-12 text-center">
                                        <p class="text-muted mb-0">Kembali ke
                                            <a href="/login" class="text-dark ml-1">
                                                <b>Login</b>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
    <!-- end Account pages -->


    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets') }}/libs/jquery/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets') }}/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{ asset('assets') }}/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('assets') }}/libs/node-waves/waves.min.js"></script>

    <script src="{{ asset('assets') }}/js/app.js"></script>

</body>

</html>
