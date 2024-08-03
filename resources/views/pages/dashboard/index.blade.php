@extends('layouts.master')

@section('page_title')
    Dashboard
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <h5 class="font-size-14">Program Kerja</h5>
                        </div>
                        <div class="avatar-xs">
                            <span class="avatar-title rounded-circle bg-primary">
                                <i class="dripicons-suitcase"></i>
                            </span>
                        </div>
                    </div>
                    <h4 class="m-0 align-self-center">{{ $proker_sinode }}</h4>
                    <p class="mb-0 mt-3 text-muted">
                        Data program kerja sinode
                        {{-- <span class="text-success">1.23 % <i class="mdi mdi-trending-up mr-1"></i></span> From previous
                        period --}}
                    </p>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <h5 class="font-size-14">Klasis</h5>
                        </div>
                        <div class="avatar-xs">
                            <span class="avatar-title rounded-circle bg-primary">
                                <i class="dripicons-link"></i>
                            </span>
                        </div>
                    </div>
                    <h4 class="m-0 align-self-center">{{ $klasis }}</h4>
                    <p class="mb-0 mt-3 text-muted">Total klasis</p>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <h5 class="font-size-14">Jemaat</h5>
                        </div>
                        <div class="avatar-xs">
                            <span class="avatar-title rounded-circle bg-primary">
                                <i class="dripicons-list"></i>
                            </span>
                        </div>
                    </div>
                    <h4 class="m-0 align-self-center">{{ $jemaat }}</h4>
                    <p class="mb-0 mt-3 text-muted">Jemaat terdaftar</p>

                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <h5 class="font-size-14">Wilayah Pelayanan</h5>
                        </div>
                        <div class="avatar-xs">
                            <span class="avatar-title rounded-circle bg-primary">
                                <i class="dripicons-suitcase"></i>
                            </span>
                        </div>
                    </div>
                    <h4 class="m-0 align-self-center">{{ $wilayah_pelayanan }}</h4>
                    <p class="mb-0 mt-3 text-muted">Wilayah pelayanan</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <h5 class="font-size-14">Program Kerja Jemaat</h5>
                        </div>
                        <div class="avatar-xs">
                            <span class="avatar-title rounded-circle bg-primary">
                                <i class="dripicons-suitcase"></i>
                            </span>
                        </div>
                    </div>
                    <h4 class="m-0 align-self-center">{{ $proker_jemaat }}</h4>
                    <p class="mb-0 mt-3 text-muted">Data program kerja jemaat</p>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <h5 class="font-size-14">Anggota PPGTM</h5>
                        </div>
                        <div class="avatar-xs">
                            <span class="avatar-title rounded-circle bg-primary">
                                <i class="dripicons-user-group"></i>
                            </span>
                        </div>
                    </div>
                    <h4 class="m-0 align-self-center">{{ $anggota_ppgtm }}</h4>
                    <p class="mb-0 mt-3 text-muted">
                        Jumlah anggota
                    </p>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <h5 class="font-size-14">Program Kerja Klasis</h5>
                        </div>
                        <div class="avatar-xs">
                            <span class="avatar-title rounded-circle bg-primary">
                                <i class="dripicons-stack"></i>
                            </span>
                        </div>
                    </div>
                    <h4 class="m-0 align-self-center">{{ $proker_klasis }}</h4>
                    <p class="mb-0 mt-3 text-muted">
                        Data Program Kerja Klasis
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <h5 class="font-size-14"> Ibadah</h5>
                        </div>
                        <div class="avatar-xs">
                            <span class="avatar-title rounded-circle bg-primary">
                                <i class="dripicons-document"></i>
                            </span>
                        </div>
                    </div>
                    <h4 class="m-0 align-self-center">{{ $jadwal_ibadah }}</h4>
                    <p class="mb-0 mt-3 text-muted">
                        Jadwal ibadah PPGTM
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
