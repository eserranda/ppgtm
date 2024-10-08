<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="/" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('assets') }}/images/logo-sm-dark.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets') }}/images/logo-dark.png" alt="" height="20">
                    </span>
                </a>

                <a href="/" class="logo logo-light">
                    <span class="logo-sm">
                        {{-- <img src="{{ asset('assets') }}/images/logo-sm-light.png" alt="" height="22"> --}}
                        <span class="text-light font-size-16">-</span>
                    </span>
                    <span class="logo-lg">
                        {{-- <img src="{{ asset('assets') }}/images/logo-light.png" alt="" height="20"> --}}
                        <span class="text-light font-size-16">PPGTM</span>
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-backburger"></i>
            </button>

        </div>

        <div class="d-flex">


            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user"
                        src="{{ asset('assets') }}/images/users/avatar-1.jpg" alt="Header Avatar">
                    <span class="d-none d-sm-inline-block ml-1">{{ Auth::user()->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <a class="dropdown-item" href="#"><i
                            class="mdi mdi-face-profile font-size-16 align-middle mr-1"></i>
                        {{ Auth::user()->username }}

                        {{-- <a class="dropdown-item" href="#"><i
                                class="mdi mdi-account-lock-outline font-size-16 align-middle mr-1"></i>
                            {{ Auth::user()->roles->first()->name }}</a> --}}
                    </a>
                    {{-- <a class="dropdown-item" href="#"><i
                            class="mdi mdi-face-profile font-size-16 align-middle mr-1"></i> Profile</a> --}}

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/logout">
                        <i class="mdi mdi-logout font-size-16 align-middle mr-1"></i> Logout</a>
                </div>
            </div>

        </div>
    </div>
</header>
