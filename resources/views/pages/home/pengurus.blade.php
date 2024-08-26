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

    <section id="team" class="team section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Pengurus</h2>
            <p>Pengurus KSB PPGTM Sinode Periode 2021-2026</p>
        </div>

        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="team-member d-flex align-items-start">
                        <div class="pic"><img src="{{ asset('home_assets') }}/img/team/no_image.png" class="img-fluid"
                                alt=""></div>
                        <div class="member-info">
                            <h4>Eddy D. Depparinding</h4>
                            <span>Ketua Umum</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="team-member d-flex align-items-start">
                        <div class="pic"><img src="{{ asset('home_assets') }}/img/team/no_image.png" class="img-fluid"
                                alt=""></div>
                        <div class="member-info">
                            <h4>Mathius Paotonan</h4>
                            <span>Sekretaris Umum</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="team-member d-flex align-items-start">
                        <div class="pic"><img src="{{ asset('home_assets') }}/img/team/no_image.png" class="img-fluid"
                                alt=""></div>
                        <div class="member-info">
                            <h4>Catherine Dessaratu</h4>
                            <span>Bendahara Umum</span>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="team-member d-flex align-items-start">
                        <div class="pic"><img src="{{ asset('home_assets') }}/img/team/team-4.jpg"
                                class="img-fluid" alt=""></div>
                        <div class="member-info">
                            <h4>Amanda Jepson</h4>
                            <span>Accountant</span>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
@endsection
