@extends('pages.home.layouts.master')

@section('hero')
    <section id="hero" class="hero section dark-background">

        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
                    <h1>Persekutuan Pemuda Gereja Toraja Mamasa</h1>
                    <p>Bahwa sesungguhnya Persekutuan Pemuda Gereja Toraja Mamasa adalah generasi masa kini dan masa
                        depan Gereja serta penerus cita-cita perjuangan bangsa.</p>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset('home_assets') }}/img/ppgtm.png" class="img-fluid animated" alt="">
                </div>

            </div>
        </div>
    </section>

    <section id="gereja" class="faq-2 section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Daftar Gereja </h2>
            <p>Daftar Gereja Anggota Persekutuan Pemuda Gereja Toraja Mamasa</p>
        </div><!-- End Section Title -->

        <div class="container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Klasis </th>
                        <th> Nama Jemaat </th>
                        <th>Pelayan/Pendeta</th>
                        <th>Alamat</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td> {{ $d->klasis->nama_klasis }} </td>
                            <td> {{ $d->nama_jemaat }} </td>
                            <td>{{ $d->pelayan }}</td>
                            <td> {{ $d->alamat }} </td>
                            <td> <a href="/gereja/{{ $d->id }}" class="btn btn-primary">Lihat</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section><!-- /Faq 2 Section -->
@endsection
