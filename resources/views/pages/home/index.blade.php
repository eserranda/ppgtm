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

    <section id="about" class="about section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Profile</h2>
        </div>

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
    </section>

    <section id="sejarah" class="section why-us light-background" data-builder="section">
        <div class="container-fluid">
            <div class="row gy-4">
                <div class="col-lg-12 d-flex flex-column justify-content-center order-2 order-lg-1">

                    <div class="content px-xl-5" data-aos="fade-up" data-aos-delay="100">
                        <h3><span>Sejara Singkat </span><strong>Persekutuan Pemuda Gereja Toraja Mamasa</strong>
                        </h3>
                        <p>
                            Persekutuan Pemuda Gereja Toraja Mamasa disingkat PPGTM adalah merupakan salah satu
                            penatalayanan kategorial dalam lingkup Gereja Toraja Mamasa yang dibentuk pada tanggal
                            13 Maret 1970 dan melembaga disemua lingkup pelayanan Gereja Toraja Mamasa. PPGTM
                            memiliki tanggung jawab untuk melaksanakan Tri Panggilan Gereja yaitu bersaksi,
                            bersekutu dan melayani sebagai bentuk implementasi iman dan kasih dalam mewujudkan
                            amanat agung Yesus Kristus
                        </p>
                        <p>
                            Bahwa PPGTM adalah juga merupakan bagian yang tidak terpisahkan dari warga Negara
                            Kesatuan Republik Indonesia yang kehadirannya diharapkan memberikan nuansa kasih dan
                            kedamaian, serta terpanggil untuk mewujudkan kesejahteraan dan keadilan sosial di
                            tengah-tengah bangsa dan umat yang majemuk dengan berlandaskan pada Pancasila dan UUD
                            1945 sebagai dasar Negara.
                        </p>
                        <p>
                            Bahwa untuk menjalankan dan menata proses kelembagaan dan kepemimpinannya, maka PPGTM
                            memiliki konstitusi penatalayanan yang disebut Pedoman Pelayanan PPGTM.
                        </p>
                    </div>
                </div>
                {{-- <div class="col-lg-5 order-1 order-lg-2 why-us-img">
                    <img src="{{ asset('home_assets') }}/img/why-us.png" class="img-fluid" alt=""
                        data-aos="zoom-in" data-aos-delay="100">
                </div> --}}
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

    <section class="faq-2 section ">
        <div class="container section-title" data-aos="fade-up">
            <h2>Program Kerja Sinode PPGTM</h2>
        </div>

        <div class="container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Program Kerja</th>
                        <th>Sasaran</th>
                        <th>Tujuan</th>
                        <th>Waktu</th>
                        <th>Bidang</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($program_kerja as $d)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $d->program_kerja }} </td>
                            <td> {{ $d->sasaran }} </td>
                            <td>{{ $d->tujuan }}</td>
                            <td>{{ $d->waktu_dan_tempat }}</td>
                            <td>{{ $d->bidang }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
