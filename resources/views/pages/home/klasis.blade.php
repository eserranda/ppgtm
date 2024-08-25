@extends('pages.home.layouts.master')

@section('hero')
    <?php
    use Carbon\Carbon;
    ?>
    <!-- Page Title -->
    <div class="page-title mt-5" data-aos="fade">
        <div class="container mt-5">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li class="current">Klasis</li>
                </ol>
            </nav>
            <h1>Info Klasis</h1>
        </div>
    </div><!-- End Page Title -->


    <section class="faq-2 section light-background">
        <div class="container section-title" data-aos="fade-up">
            <h2>Pegurus Klasis </h2>
            <p>Daftar Pengurus Klasis</p>
        </div>

        <div class="container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama </th>
                        <th>Bidang</th>
                        <th>Jabatan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengurus_klasis as $d)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td> {{ $d->nama }} </td>
                            <td> {{ $d->bidang }} </td>
                            <td> {{ $d->jabatan }} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <section class="faq-2 section light-background">
        <div class="container section-title" data-aos="fade-up">
            <h2>Data Klasis</h2>
            <p>Daftar Klasis Gereja Toraja Mamasa</p>
        </div>

        <div class="container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama </th>
                        <th>Wilayah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($klasis as $d)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td> {{ $d->nama_klasis }} </td>
                            <td> {{ $d->wilayah }} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
