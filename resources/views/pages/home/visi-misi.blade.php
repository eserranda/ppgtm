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

    <!-- About Section -->
    <section id="about" class="about section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Visi Misi</h2>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                    <h4>Misi</h4>
                    <ul>
                        <li><i class="bi bi-check2-circle"></i> <span>PPGTM berbentuk penatalayanan kategorial yang
                                merupakan wadah pelayanan khusus bagi warga Gereja kategori pemuda..</span></li>
                        <li><i class="bi bi-check2-circle"></i> <span>PPGTM merupakan bagian yang tidak terpisahkan
                                dari Gereja Toraja Mamasa</span></li>
                    </ul>
                </div>

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <h4>Visi</h4>
                    <p>PPGTM bertujuan untuk mempersekutukan, memperlengkapi dan menggerakkan warganya menjadi umat
                        Allah yang mengemban tugas panggilan Allah. </p>
                </div>

            </div>

        </div>

    </section><!-- /About Section -->
@endsection
