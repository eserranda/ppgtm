<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login | PPGTM</title>
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        {{-- <a href="index.html" class="logo"><img src="{{ asset('assets') }}/images/logo-light.png"
                                height="24" alt="logo"></a> --}}
                        <h5 class="font-size-20 text-white mb-4">Persekutuan Pemuda Gereja Toraja Mamasa</h5>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="p-2">
                                <h5 class="mb-5 text-center">Silahkan Login</h5>
                                <form class="form-horizontal " method="POST" action="{{ route('login') }}">
                                    @csrf
                                    @error('login')
                                        <ul class="alert alert-danger">
                                            <li>{{ $message }}</li>
                                        </ul>
                                    @enderror

                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group mb-4">
                                                <label for="username">Username atau email</label>
                                                <input type="text" class="form-control" name="login"
                                                    value="{{ old('login') }}" placeholder="Enter username or email">
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="userpassword">Password</label>
                                                <input type="password" class="form-control" name="password"
                                                    placeholder="Enter password">
                                            </div>

                                            {{-- <div class="row">
                                                <div class="col-md-6">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customControlInline">
                                                        <label class="custom-control-label"
                                                            for="customControlInline">Remember me</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="text-md-right mt-3 mt-md-0">
                                                        <a href="auth-recoverpw.html" class="text-muted"><i
                                                                class="mdi mdi-lock"></i> Forgot your password?</a>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <div class="mt-4">
                                                <button class="btn btn-success btn-block waves-effect waves-light"
                                                    type="submit">Log In</button>
                                            </div>
                                            {{-- <div class="mt-4 text-center">
                                                <a href="auth-register.html" class="text-muted"><i
                                                        class="mdi mdi-account-circle mr-1"></i> Create an account</a>
                                            </div> --}}
                                        </div>
                                    </div>
                                </form>

                                <div class="row mt-4 justify-content-end">
                                    <div class="col-sm-12">
                                        <a href="/forgot-password" class="text-muted"><i class="mdi mdi-lock"></i>
                                            Lupa password?
                                        </a>
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
